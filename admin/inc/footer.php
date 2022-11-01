</div>
</main>

<footer class="bg-dark py-3">
  <p class="text-center text-muted">&copy; 2022 Company, Inc</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });
</script>

<script>
  $(document).ready(function() {
    $("#id_dm").change(function() {
      var id = $(this).val()
      $.get("ajax.php", {
        id_dm: id
      }, function(data) {
        $("#id_th").html(data);
      })
    })
  })
</script>

</body>

</html>