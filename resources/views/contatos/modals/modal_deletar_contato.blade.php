<div class="modal fade" id='modal_deletar_contato' tabindex='-1' role="dialog" aria-labelledby="modal_deletar_contato" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar contato?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='form_deletar_contato' action="" method='post'>
                    @csrf

                    <div class="row">
                        <button type='submit' class='btn btn-danger d-block ml-auto mr-2'>
                            <i class="{{config('app.material')}}">delete_forever</i> Deletar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>