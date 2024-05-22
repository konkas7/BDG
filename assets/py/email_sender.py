import smtplib
import os

# Usa il percorso assoluto al file
file_path = os.path.join(os.path.dirname(__file__), 'order_details.txt')

try:
    # Verifica se il file esiste
    if not os.path.exists(file_path):
        raise FileNotFoundError(f"File non trovato: {file_path}")
    
    # Leggi i dettagli dell'ordine dal file
    with open(file_path, 'r', encoding='utf-8') as file:
        lines = file.readlines()
        subject = lines[0].strip()
        message = ''.join(lines[2:])

    email = "bottegadigerosa@gmail.com"
    receiver_email = "bottegadigerosa@gmail.com"

    # Assicurati di inviare l'email come UTF-8
    text = f"Subject: {subject}\n\n{message}".encode('utf-8')

    server = smtplib.SMTP("smtp.gmail.com", 587)
    server.starttls()

    server.login(email, "cmbt wfhi zfjl ockh")
    server.sendmail(email, receiver_email, text)

    print("Email has been sent to " + receiver_email)
except Exception as e:
    print(f"An error occurred: {e}")
    exit(1)  # Assicurati che il codice di ritorno sia 1 in caso di errore

exit(0)  # Assicurati che il codice di ritorno sia 0 in caso di successo
