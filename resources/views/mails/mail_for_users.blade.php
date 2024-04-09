<div style="background-color: #e9eff9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
    <div style="text-align: center; font-family: Arial, sans-serif; margin-bottom: 20px;">
        <h1 style="color: #002366; display: inline-block; margin: 0; padding-right: 20px; position: relative; font-size: 24px;">
            Informazioni corso
            <span style="position: absolute; height: 6px; width: 100px; background-color: #002366; top: 50%; right: -120px;"></span>
        </h1>
    </div>     
    <div style="background-color: #ffffff; padding: 15px; border-radius: 10px; margin-top: 20px;">
        <h2 style="border-left: 5px solid #002366; padding-left: 5px; color: #002366; font-family: Arial, sans-serif;">Utente:</h2>
        <p style="color: #333;">Nome: {{ $lead->name }}</p>
        <p style="color: #333;">Cognome: {{ $lead->surname }}</p>
        <p style="color: #333;">Email: {{ $lead->email }}</p>

    </div>

    <div style="background-color: #ffffff; padding: 15px; border-radius: 10px; margin-top: 20px;">
        <h2 style="border-left: 5px solid #002366; padding-left: 5px; color: #002366; font-family: Arial, sans-serif;">Corsisti:</h2>
        @foreach ($customers as $customer)
            <p style="color: #333;">Nome: {{ $customer->name }}</p>
            <p style="color: #333;">Cognome: {{ $customer->surname }}</p>
            <p style="color: #333;">Email: {{ $customer->email }}</p>
            <p style="color: #333;">C.F.: {{ $customer->cfr }}</p>
            <p style="color: #333;"Data di nascita: {{ $customer->date_of_birth }}</p>
            <p style="color: #333;">Città di nascita: {{ $customer->city_of_birth }}</p>
            <p style="color: #333;">Mansione: {{ $customer->task }}</p>            
        @endforeach
    </div>

    <div style="background-color: #ffffff; padding: 15px; border-radius: 10px; margin-top: 20px;">
        <h2 style="border-left: 5px solid #002366; padding-left: 5px; color: #002366; font-family: Arial, sans-serif;">Corso:</h2>
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
        <p>Stato del corso: <strong style="color: red;">{{ $course->status }}</strong></p>
    </div>
</div>