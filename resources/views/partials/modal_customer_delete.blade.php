<div class="modal fade" id="customerConfirmDeleteModal" tabindex="-1" aria-labelledby="customerConfirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerConfirmDeleteLabel">Conferma cancellazione corsista</h5>
                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler cancellare il corsista <span id="modal-customer-name"></span> e i corsi associati?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="button" class="btn btn-danger" id="customer-confirm-delete-button">Cancella</button>
            </div>
        </div>
    </div>
</div>