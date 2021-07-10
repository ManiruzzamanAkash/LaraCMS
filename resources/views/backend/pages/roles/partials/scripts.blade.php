<script>
    $("#allManagement").click(function() {
       if($(this).is(':checked'))  
           $('input[type=checkbox]').prop('checked', true);
       else    
           $('input[type=checkbox]').prop('checked', false);
   })

   /**
   * checkPrmissions()
   * Check and uncheck permissions
   */
   function checkPrmissions(className, checkThis) {
       const groupClassName = $('#'+checkThis.id);
       const classCheckbox = $('.'+className+'-checkbox input');

       if(groupClassName.is(':checked'))   classCheckbox.prop('checked', true);
       else    classCheckbox.prop('checked', false);
       implementAllChecked();
   }

   function checkSinglePrmission(className, groupID, countTotalPermission) {

       const classCheckbox = $('.'+className+'-checkbox input');
       const groupIDBox = $('#'+groupID);

       // if there is any occurance where somthing is not selected then make selected = false
       if($('.'+className+'-checkbox input:checked').length == countTotalPermission){
        groupIDBox.prop('checked', true);
       }else{
        groupIDBox.prop('checked', false);
       }
       implementAllChecked();
   }
   
   function implementAllChecked() {
       let countPermissions = <?php echo count($all_permissions); ?>;
       let countPermissionsGroup = <?php echo count($permissions_group); ?>;
       
       // if there is any occurance where somthing is not selected then make selected = false
       if($('input[type="checkbox"]:checked').length > (countPermissions + countPermissionsGroup)){
        $('#allManagement').prop('checked', true);
       }else{
        $('#allManagement').prop('checked', false);
       }
   }
</script>