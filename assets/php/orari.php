<?php
// Includi il file di connessione al database
include 'db_connection.php';



// Esegui una query per ottenere gli orari dalla tabella orari
$query = "SELECT giorno, orario_mattino, orario_pomeriggio FROM orari ORDER BY FIELD(giorno, 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato', 'Domenica')";
$result = mysqli_query($conn, $query); // Usa $conn invece di $connection

// Controlla se ci sono risultati
if (mysqli_num_rows($result) > 0) {
    // Inizia la stampa dei risultati all'interno del markup HTML
    echo '<section id="blog" class="blog">
            <div class="container">
                <div class="section-header">
                    <h2>Orari<br>‎ </h2>
                </div><!--/.section-header-->
                <div class="orari-content">
                    <div class="row">';
    
    // Loop attraverso ogni riga di risultato
    while ($row = mysqli_fetch_assoc($result)) {
        // Verifica se il giorno è "Domenica" e aggiungi la classe di offset
        $offset_class = ($row['giorno'] === 'Domenica') ? 'col-md-offset-4' : '';
        
        echo '<div class="col-md-4 col-sm-6 '.$offset_class.'">
                <div class="single-orario-item text-center">
                    <h3>'.$row['giorno'].'</h3>
                    <div class="orario-box">
                        <div class="orario-mattino"><br>'.$row['orario_mattino'].'</div>
                        <div class="orario-pomeriggio">'.$row['orario_pomeriggio'].'</div>
                    </div>
                </div>
              </div>';
    }
    
    // Chiudi il markup HTML
    echo '</div></div></div><!--/.container--></section><!--/.orari-->';
} else {
    // Messaggio di errore nel caso in cui non ci siano orari nel database
    echo "Nessun orario disponibile.";
}

// Chiudi la connessione al database
mysqli_close($conn); // Usa $conn invece di $connection
?>
