<script src="https://cdn.tiny.cloud/1/tdk22c5d5m76l5ulaelsjh61hvd2j52e5rmx0vbwe5aij568/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    menubar: false,
    entity_encoding: "raw",
     images_upload_url: "/postimage.php"
  });
</script>