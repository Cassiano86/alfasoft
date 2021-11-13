$(function(){
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $('.btn_deletar').on('click',function(){
        $('#form_deletar_contato').prop('action', $(this).data('href'));
        $('#modal_deletar_contato').modal('show');
    });
});