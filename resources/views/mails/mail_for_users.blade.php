<h1>Informazioni del Corso</h1>
    <h2>Utente:</h2>
    <p>Nome: {{ $lead->name }}</p>
    <p>Cognome: {{ $lead->surname }}</p>
    <p>Email: {{ $lead->email }}</p>

    <h2>Corsisti:</h2>
    @foreach ($customers as $customer)
        <p>Nome: {{ $customer->name }}</p>
        <p>Cognome: {{ $customer->surname }}</p>
        <p>Email: {{ $customer->email }}</p>
        <p>C.F.: {{ $customer->cfr }}</p>
        <p>Data di nascita: {{ $customer->date_of_birth }}</p>
        <p>Città di nascita: {{ $customer->city_of_birth }}</p>
        <p>Mansione: {{ $customer->task }}</p>
    @endforeach

    <h2>Corso:</h2>
    <p>Corso: {{ $course->nome_corso }} aut. {{ $course->numero_autorizzazione }}</p>
    <p>Genere corso: {{ $course->genere_corso }}</p>
    <p>Città: {{ $course->cap_sede_corso }}, {{ $course->città_di_svolgimento }} ({{ $course->provincia }})</p>
    <p>Sede: {{ $course->indirizzo_di_svolgimento }}</p>
    <p>Direttore: <strong>{{ $course->direttore_corso }}</strong></p>
    <p>Docente: <strong>{{ $course->docenti_corso }}</strong></p>
    <p>Data Inizio: {{ $course->inizio_di_svolgimento }}</p>
    <p>Data Termine: {{ $course->fine_svolgimento }}</p>
    <p>N° partecipanti: <strong>{{ $course->posti_disponibili }}</strong></p>
    <p>Durata: {{ $course->durata_corso }} ore</p>
    <p>Validità: {{ $course->validità }} anni</p> 
    <p>Data di Scadenza: {{ $course->data_scadenza }}</p>
    <p>Stato del corso: <strong style="color: rgb(237, 31, 31)">{{ $course->status }}</strong></p>    

    <p>Grazie per la tua partecipazione al corso!</p>