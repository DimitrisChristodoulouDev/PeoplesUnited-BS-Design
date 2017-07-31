$(function () {

    $(".date-picker").datepicker({format: 'yyyy-mm-dd'});



    getContact()


})

function getContact() {
    var contactID = getUrlParameter('id')
    callAjax('/contact/'+contactID,{}).done(function (response) {
        var data ={
            contact: response
        }
        console.log(data)
        handlebarsRenderTemplate('#profileDetailsTemplate', '#profileDetails', data);
    })
}