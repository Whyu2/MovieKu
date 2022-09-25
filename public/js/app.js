$(document).ready(function () {
    $('#example').DataTable();
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });    
    $(document).on('click','.delete_btn_kategori',function(){
        var id_kat = $(this).val();
        $('#DeleteModalKategori').modal('show');
        $('#id_delete').val(id_kat);
      });
      $(document).on('click','.delete_btn_movie',function(){
        var id_kat = $(this).val();
        $('#DeleteModalMovie').modal('show');
        $('#id_delete').val(id_kat);
      });
      ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
      
   
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
};




