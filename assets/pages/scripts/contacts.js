$(document).ready(function () {

    getAllContacts()
    /*$(document.body).on('click','.edit-contact', editContact)
    $(document.body).on('click','.star-contact', starContact)
    $(document.body).on('click','.delete-contact', deleteContact)*/
})

function getAllContacts() {

    obj = {
        filter:['agents']
    }

    callAjax('contacts', obj)
        .done(function (response) {
            var res = response;
            var data = {}
//            define categoriesList
            var contactCategories = [];
            $.each(res, function (i, item) {
                var a = {
                    label: null || item.contact_category.categoryLabel,
                    value: item.contact_category.tableNameReference,
                    category_id: item.contact_category.id
                };//obj to push
                var found = contactCategories.some(function (el) {
                    return el.category_id === item.contact_category.id;
                });
                if (!found) contactCategories.push(a)
            })
            data.contactCategories = contactCategories
            handlebarsRenderTemplate('#contactsFilterTemplate', '#contactsFilter', data)
            $('#contactsFilter').selectpicker('refresh')
            data = {contacts:res};
            handlebarsRenderTemplate('#contactsGridTemplate', '#contactsGrid', data)
        });


}

function editContact() {
    $('#editContactModal').modal('open')
    callAjax('/contact/'+$(this).attr('data-edit'),{})
        .done(function (response) {
            console.log(response)
            var r = response
            var data = {
                contact: r
            };
            var a = handlebarsRenderTemplate('#editContactModalTemplate', data);
            console.log(a)
            $('#contactInfo').append(a)
            // Materialize.updateTextFields();



        })
}

function starContact() {
    console.log(this)

}
function deleteContact() {

}