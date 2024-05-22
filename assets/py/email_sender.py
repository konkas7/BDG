import smtplib

email = "bottegadigerosa@gmail.com"
receiver_email = "bottegadigerosa@gmail.com"
subject = "ciao"
message = "pappa"


text = f"Subject: {subject}\n\n{message}"

server = smtplib.SMTP("smtp.gmail.com", 587)
server.starttls()

server.login(email, "cmbt wfhi zfjl ockh")

server.sendmail(email, receiver_email, text)

print("Email has been sent to " + receiver_email)
