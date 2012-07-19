$(function() {
	var opts = {
  container: 'epiceditor',
  basePath: '<?php echo Router::url('/'); ?>/js/epiceditor/',
  clientSideStorage: true,
  localStorageName: 'epiceditor',
  parser: marked,
  file: {
    name: 'epiceditor',
    defaultContent: '',
    autoSave: 100
  }
};
	var editor = new EpicEditor(opts).load(function () {
								console.log("Editor loaded.")
							});
	$("#BotonContribuciones").activarTopMenu();
});
