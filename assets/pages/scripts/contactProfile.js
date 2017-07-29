$(function () {

    $(".date-picker").datepicker({format: 'yyyy-mm-dd'});



    getContact()


})

function getContact() {
    var contactID = getUrlParameter('id')
    console.log(contactID)
}