import smtplib
import os
import mysql.connector
from email.mime.text import MIMEText

# Database connection details
db_config = {
    'user': 'bottegadigerosa',
    'password': 'bottegadigerosa',
    'host': 'localhost',
    'database': 'my_bottegadigerosa'
}

# Email configuration
smtp_server = 'smtp.gmail.com'
smtp_port = 587
smtp_user = 'bottegadigerosa@gmail.com'
smtp_password = 'cmbt wfhi zfjl ockh'

# Path to the offers file
file_path = os.path.join(os.path.dirname(__file__), 'offerte.txt')

try:
    # Verify if the file exists
    if not os.path.exists(file_path):
        raise FileNotFoundError(f"File not found: {file_path}")

    # Read the offers from the file
    with open(file_path, 'r', encoding='utf-8') as file:
        lines = file.readlines()
        subject = lines[0].strip()  # Assuming the first line is the subject
        message = ''.join(lines[1:]).strip()  # The rest is the message

    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()

    # Fetch email addresses
    cursor.execute("SELECT email FROM news_letter")
    emails = cursor.fetchall()

    # Close the database connection
    cursor.close()
    conn.close()

    # Function to send an email
    def send_email(to_email, subject, body):
        msg = MIMEText(body, 'plain', 'utf-8')
        msg['From'] = smtp_user
        msg['To'] = to_email
        msg['Subject'] = subject

        try:
            server = smtplib.SMTP(smtp_server, smtp_port)
            server.starttls()
            server.login(smtp_user, smtp_password)
            server.sendmail(smtp_user, to_email, msg.as_string())
            server.quit()
            print(f'Email sent to {to_email}')
        except Exception as e:
            print(f'Failed to send email to {to_email}: {e}')

    # Send emails
    for email in emails:
        send_email(email[0], subject, message)

except Exception as e:
    print(f"An error occurred: {e}")
    exit(1)  # Ensure the return code is 1 in case of error

exit(0)  # Ensure the return code is 0 in case of success
