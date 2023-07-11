$(document).ready(function () {
  $("#editableTable").SetEditable({
    columnsEd: "1,2,3,4",
    onEdit: function (columnsEd) {
      var empId = columnsEd[0].childNodes[1].innerHTML;
      var firstName = columnsEd[0].childNodes[3].innerHTML;
      console.log(firstName);
      var lastName = columnsEd[0].childNodes[5].innerHTML;
      var email = columnsEd[0].childNodes[7].innerHTML;
      var phoneNumber = columnsEd[0].childNodes[9].innerHTML;
      $.ajax({
        type: "POST",
        url: "?mod=admin&act=editUser",
        dataType: "json",
        data: {
          id: empId,
          firstName: firstName,
          lastName: lastName,
          email: email,
          phoneNumber: phoneNumber,
          action: "edit",
        },
        success: function (response) {
          if (response.status == 1) {
            window.location.href =
              "http://localhost/PHP-practice-project/?mod=admin&act=viewAdminPage";
          }
          if (response.status == 0) {
            window.location.href =
              "http://localhost/PHP-practice-project/?mod=admin&act=viewAdminPage";
          }
        },
      });
    },
    onBeforeDelete: function (columnsEd) {
      var empId = columnsEd[0].childNodes[1].innerHTML;
      $.ajax({
        type: "POST",
        url: "?mod=admin&act=deleteUser",
        dataType: "json",
        data: { id: empId, action: "delete" },
        success: function (response) {
          // if (response.status == 1) {
          //   window.location.href =
          //     "http://localhost/PHP-practice-project/?mod=admin&act=viewAdminPage";
          // }
        },
      });
    },
  });
});
