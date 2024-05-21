import smtplib

email = input("SENDER EMAIL: ")
receiver_email = input("RECEIVER EMAIL: ")
subject = input("SUBJECT: ")
message = input("MESSAGE: ")


text = f"Subject: {subject}\n\n{message}"

server = smtplib.SMTP("smtp.google.com", 587)
server.starttls()

server.login(email, "cmbt wfhi zfjl ockh")

server.sendmail(email, receiver_email, text)

print("Email has been sent to" + receiver_email)
