import smtplib
import json
import sys

# Leggi il percorso del file temporaneo passato come argomento
data_file = sys.argv[1]

# Leggi i dati dal file
with open(data_file, 'r') as file:
    data = json.load(file)

userName = data['userName']
products = data['products']

email = "bottegadigerosa@gmail.com"
receiver_email = "bottegadigerosa@gmail.com"
subject = userName
message = "\n".join([f"{p['nome']} - {p['quantita']} pcs - €{p['prezzo_totale']}" for p in products])

text = f"Subject: {subject}\n\n{message}"

server = smtplib.SMTP("smtp.gmail.com", 587)
server.starttls()

server.login(email, "cmbt wfhi zfjl ockh")

server.sendmail(email, receiver_email, text)

print("Email has been sent to " + receiver_email)
