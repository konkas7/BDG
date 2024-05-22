import smtplib
import os

# Leggi i dettagli dell'ordine dal file
with open('order_details.txt', 'r') as file:
    lines = file.readlines()
    subject = lines[0].strip()
    message = ''.join(lines[2:])

email = "bottegadigerosa@gmail.com"
receiver_email = "bottegadigerosa@gmail.com"

text = f"Subject: {subject}\n\n{message}"

server = smtplib.SMTP("smtp.gmail.com", 587)
server.starttls()

server.login(email, "cmbt wfhi zfjl ockh")

server.sendmail(email, receiver_email, text)

print("Email has been sent to " + receiver_email)
