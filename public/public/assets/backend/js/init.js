// Simple Tiny MCE
tinymce.init({
  selector: ".tinymce_simple",
  theme: "modern",
  height: 80,
  menubar: false,
  statusbar: false,
  plugins: [
    "autolink link image lists hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality template paste textcolor",
  ],
  valid_elements : '*[*]',
  toolbar:
    "undo redo styleselect bold italic  alignleft aligncenter alignright alignjustify bullist numlist link  preview fullpage forecolor",
});

// Advance Tiny MCE
tinymce.init({
  selector: ".tinymce_advance",
  theme: "modern",
  height: 150,
  plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality emoticons template paste textcolor code",
  ],
  valid_elements : '*[*]',
  toolbar:
    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print media fullpage | forecolor backcolor emoticons | code preview",
});
