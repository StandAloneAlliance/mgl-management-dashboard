<h1>Informazioni del Corso</h1>
    <p>Status: {{ $course->status }}</p>
    <p>Data di Scadenza: {{ $course->data_scadenza }}</p>
    <!-- Altre informazioni del corso qui -->

    <h2>Corsisti Associati</h2>
    @foreach ($customers as $customer)
        <p>Nome: {{ $customer->name }}</p>
        <p>Cognome: {{ $customer->surname }}</p>
        <p>Email: {{ $customer->email }}</p>
        <!-- Altre informazioni del corsista qui -->
    @endforeach

    <h2>Informazioni Utente</h2>
    <p>Nome: {{ $lead->name }}</p>
    <p>Cognome: {{ $lead->surname }}</p>
    <p>Email: {{ $lead->email }}</p>
    <!-- Altre informazioni del corsista qui -->

    <p>Grazie per la tua partecipazione al corso!</p>