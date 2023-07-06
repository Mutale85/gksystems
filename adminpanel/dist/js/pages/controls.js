$(document).ready(function() {
    // Find all tables with id="divTable"
    var tables = $('table[id="allTables"]');
    
    // Initialize DataTables for each of these tables
    tables.each(function() {
      $(this).DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ]
      });
    });

    

    // submit employee script ------------

   
    $('#employeeForm').submit(function(event) {
      event.preventDefault(); 
      var formData = $(this).serialize();
      $.ajax({
        url: 'addons/submitEmployee.php',
        type: 'POST',
        data: formData,
        beforeSend:function(){
          $("#add_employee").html("Process...");
        },

        success: function(response) {
          alert(response);
          console.log('Form submitted successfully');
          fetchEMployees();
          $("#add_employee").html("Add Employee");
          $('#employeeForm')[0].reset();
        },
        error: function(xhr, status, error) {
          console.log('Error submitting form: ' + error);
        }
      });
    });
  

    $(document).on("click", ".edit_data", function(e){
      e.preventDefault();
      var employee_id = $(this).attr("href");
      $.ajax({
        url:"addons/editEmployee",
        method:"post",
        data:{employee_id:employee_id},
        dataType:'Json',
        success:function(data){
          $("#empBtn").click();
          $("#add_employee").html("Update Details");
          $("#employee_id").val(data.id);
          $("#firstname").val(data.firstname);
          $("#lastname").val(data.lastname);
          $("#email").val(data.email);
          $("#phonenumber").val(data.phonenumber);
          $("#department").val(data.department);
          $('#job_title').val(data.job_title);
          $("#user_role").val(data.user_role);
          
        }
      })
    })
  });

  function fetchEMployees(){
      var fetchEMployees = "fetchEMployees";
      $.ajax({
          url: 'addons/fetchEMployees',
          type: 'POST',
          data: {fetchEMployees:fetchEMployees},
          success: function(data) {
              $("#fetchEMployees").html(data);
          },
          
      });
  }
  fetchEMployees();


  // add and submit real estates tenants ----

    $(function(){
        $("#tenantsForm").submit(function(e){
            e.preventDefault();
            var tenantsForm = $(this).serialize();
            $.ajax({
                url: "addons/submitTenant",
                method:"post",
                data:tenantsForm,
                // dataType:'Json',
                beforeSend:function(){
                    $("#submitBtn").html("Processing...");
                },
                success:function(response){
                    $("#submitBtn").html("Add Tenant");
                    alert(response);
                    // location.reload();
                }
            })
      });

        $(document).on("click", ".edit_tenant", function(e){
            e.preventDefault();
            var tenant_id = $(this).attr("href");
            $("#btnModal").click();
            $.ajax({
                url: "real-estates/parsers/editTenant",
                method:"post",
                data:{tenant_id:tenant_id},
                dataType:'Json',
                success:function(data){
                    $("#first_name").val(data.firstname);
                    $("#last_name").val(data.lastname);
                    $("#tenant_email").val(data.email);
                    $("#phonenumber").val(data.phonenumber);
                    $("#house_number").val(data.house_number);
                    $("#num_people").val(data.num_people);
                    $("#leaseStartDate").val(data.leaseStartDate);
                    $("#leaseEndDate").val(data.leaseEndDate);
                    $("#currency").val(data.currency);
                    $("#rentAmount").val(data.rentAmount);
                    $("#paymentFrequency").val(data.paymentFrequency);
                    $("#tenant_id").val(data.tenant_id);
                    $("#submitBtn").html("Update Details");
                }
            })
        })

        $(document).on("click", ".view_details", function(e){
            e.preventDefault();
            $("#tenantDetails").click();
            var tenant_id = $(this).attr("href");
            $.ajax({
                url: "real-estates/parsers/fetchTenantDetails",
                method:"post",
                data:{tenant_id:tenant_id},
                
                success:function(data){
                    $("#details_modal").html(data);
                }
            })
        })
    })

    $( function() {
      var dateFormat = "DD, d MM, yy",
        from = $( "#leaseStartDate" )
          .datepicker({
            
            changeMonth: true,
            // numberOfMonths: 2,
            dateFormat: "DD, d MM, yy"
          })
          .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
          }),
        to = $( "#leaseEndDate" ).datepicker({
          
          changeMonth: true,
          // numberOfMonths: 2,
          dateFormat: "DD, d MM, yy"
        })
        .on( "change", function() {
          from.datepicker( "option", "maxDate", getDate( this ) );
        });
   
      function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
  
        return date;
      }

      $("#problemDate, #agreement_date").datepicker({
        // defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "DD, d MM, yy"
      })
  });

  $(document).ready(function() {
    $('#problemReportForm').submit(function(e) {
      e.preventDefault(); // Prevent form submission
  
      // Create FormData object to store form data
      var formData = new FormData(this);
  
      $.ajax({
        url: 'addons/process_clients_report', // URL for the server-side script to process the form data
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response) {
          if (response.success) {
            alert('Well done! Your report has been submitted successfully.');
          } else {
            alert('Try again! Something went wrong while submitting your report.');
          }
        },
        error: function(xhr, status, error) {
          // Handle error response
          alert(xhr.responseText);
          // Display error message or perform any other actions
        }
      });
    });


    // ============= Problem reports =============== View reported problme details ============

    $(document).on("click", ".view_report_details", function(e){
      e.preventDefault();
      $("#resultsBtn").click();

      var reference = $(this).attr("href");
      $.ajax({
          url: "addons/fetchReportDetails",
          method:"post",
          data:{reference:reference},
          
          success:function(data){
              $("#details_modal").html(data);
              $("#resultsModalLabel").text("View Report Details");
          }
      })
    })    

    $(document).on("click", ".view_incident_report_details", function(e){
      e.preventDefault();
      $("#resultsBtn").click();

      var reference_report_id = $(this).attr("href");
      $.ajax({
          url: "addons/fetchReportDetails",
          method:"post",
          data:{reference_report_id:reference_report_id},
          
          success:function(data){
              $("#details_modal").html(data);
              $("#resultsModalLabel").text("View Report Details");
          }
      })
    })

    
    $(document).on("click", ".assign_task", function(e){
      e.preventDefault();
      $("#resultsBtn").click();

      var reference = $(this).attr("href");
      $.ajax({
          url: "addons/fetchTaskTeams",
          method:"post",
          data:{reference:reference},
          
          success:function(data){
            $("#details_modal").html(data);
            $("#resultsModalLabel").text("Assign Task");
          }
      })
    })

    $(document).on("click", ".update_work_status", function(e){
      e.preventDefault();
      var taskId = $(this).attr("id");
      $("#resultsBtn_"+taskId).click();
    })
    
});

$('#taskUpdate').submit(function(e) {
  e.preventDefault(); 
  var formData = new FormData(this);
  $.ajax({
    url: 'addons/report_on_tasks_done',
    type: 'POST',
    data: formData,
    dataType: 'json',
    contentType: false,
    processData: false,
    beforeSend:function(){
      $("#submit_btn").html("Processing...");
    }, 
    success: function(response) {
      if (response.success) {
        alert('Well done! Your report has been submitted successfully.');
        setTimeout(function(){
          location.reload();
        }, 1000);
      } else {
        alert('Try again! Something went wrong while submitting your report.');
      }
      $("#submit_btn").html("Submit");
    },
    error: function(xhr, status, error) {
      alert(xhr.responseText);
      $("#submit_btn").html("Submit");
    }
  });

});

$(document).on("click", ".view_completed_task", function(e){
  e.preventDefault();
  $("#resultsBtn").click();

  var reference = $(this).attr("href");
  $.ajax({
      url: "addons/fetchAssignedTaskReport",
      method:"post",
      data:{reference:reference},
      
      success:function(data){
          $("#details_modal").html(data);
          $("#resultsModalLabel").text("Assigned Task Report");
      }
  })
})

// ================================ Orphanage ===========

function fetchCareTakers(){
  var caretakers = 'orphanage';
  $.ajax({
    url: 'addons/get_caretakers',
    type: 'post',
    data:{caretakers:caretakers},
    success: function(response) {
      $('#caretakerId').html(response);
    }
  });
}

$(document).ready(function() {
  // Load caretakers dynamically on modal show
  $('#addOrphanBtn').click(function() {
    fetchCareTakers();
  });

  // Submit form using AJAX
  $('#addOrphanForm').submit(function(e) {
    e.preventDefault();

    var form = $(this);
    var url = form.attr('action');
    var formData = new FormData(this);

    $.ajax({
      url: 'addons/add_orphan',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      beforeSend:function(){
        $("#orphanbtn").html("Processing...");
      },
      success: function(response) {
        alert(response);
        $("#orphanbtn").html("Add Orphan");
        $('#addOrphanForm')[0].reset();
        
      }
    });
  });

  // fetch orphan ....


  // edit orphan
  $(document).on("click", ".edit_orphan", function(e){
    e.preventDefault();
    var orphan_id = $(this).attr("href");
    $('#addOrphanBtn').click();
    $.ajax({
        url: "addons/editOrphans",
        method:"post",
        data:{orphan_id:orphan_id},
        dataType:'Json',
        success:function(data){
            $("#names").val(data.names);
            $("#orphan_id").val(data.orphan_id);
            $("#age").val(data.age);
            $("#gender").val(data.gender);
            $("#caretakerId").val(data.caretaker_id);
            $("#orphanbtn").html("Update Details");
        }
    })
  })

  // delete the orphan ====
  $(document).on("click", ".remove_orphan", function(e){
    e.preventDefault();
    var orphan_id = $(this).attr("href");
    if(confirm("You are about to delete the orphan, it will not be reversed")){
      $.ajax({
          url: "addons/deleteActions",
          method:"post",
          data:{orphan_id:orphan_id},
          
          success:function(data){
              alert(data);
          }
      })
    }else{
      return false;
    }
  })
});


// ================= Tenants ============ Agreement ================ Form

$(document).ready(function () {
  $('#leaseForm').submit(function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: 'addons/submit_lease_agreement_form',
          data: formData,
          dataType: 'json',
          success: function (response) {
              if (response.success) {
                  // Display success message
                  alert(response.message);
                  // Optionally, reset the form
                  $('#leaseForm')[0].reset();
              } else {
                  // Display error message
                  alert(response.message);
              }
          },
          error: function (xhr, status, error) {
              // Display error message
              alert('An error occurred while submitting the form: ' + error);
          }
      });
  });

    $(document).on("click", ".view_agreement", function(e){
      e.preventDefault();
      $("#tenantDetails").click();
      var tenant_id = $(this).attr("href");
      $.ajax({
          url: "addons/fetchTenantLeaseAgreement",
          method:"post",
          data:{tenant_id:tenant_id},
          
          success:function(data){
              $("#details_modal").html(data);
              $("#resultsModalLabel").text("Tenant Lease Agreement");
          }
      })
  })
});
//==== print tenants agreement
function printContent(el){
  $(".printBtn").css("display", "none");
  var restorepage = $('body').html();
  var printcontent = $('#' + el).clone();
  $('body').empty().html(printcontent);
  window.print();
  $('body').html(restorepage);
  $(".printBtn").css("display", "block");

}

// ==================== INCOME & EXPENSE =====================

$(document).ready(function() {
  $('#transactionForm').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      url: 'addons/submitTransactions',
      type: 'POST',
      data: formData,
      dataType: 'json',
      beforeSend:function(){
        $("#btnTrans").html("Processing...");
      },
      success: function (response) {
        if (response.success) {
            alert(response.message);
            $('#transactionForm')[0].reset();
            
        } else {
            alert(response.message);
        }
        loadIncomeTable();
        loadExpenseTable();
        $("#btnTrans").html("Add Transaction");
      },
    });
  });

  // edit transaction
  
  $(document).on("click", ".editTransaction", function(e){
    e.preventDefault();
    var transaction_id = $(this).attr("href");
    $.ajax({
      url:"addons/editTransactions",
      method:"post",
      data:{transaction_id:transaction_id},
      dataType:'Json',
      success:function(data){
        $("#transactionBtn").click();
        $("#btnTrans").html("Update Transaction");
        $("#transaction_id").val(data.id);
        $("#amount").val(data.amount);
        $("#description").val(data.description);
        $("#type").val(data.type);
      }
    })
  });

  // delete transactions ====

  $(document).on("click", ".removeTransaction", function(e){
    e.preventDefault();
    var transaction_id = $(this).attr("href");
    if(confirm("You wont reverse the transaction when you delete it !")){
      $.ajax({
        url:"addons/removeTransaction",
        method:"post",
        data:{transaction_id:transaction_id},
        success:function(data){
          alert(data);
          loadIncomeTable();
          loadExpenseTable();
        }
      })
    }else{
      return false;
    }
  });
});


//============ Display the income and expenses in the dynamic tables

  function loadIncomeTable() {
    var income = 'income';
    $.ajax({
      url: 'addons/getIncomeData',
      type: 'POST',
      data:{income:income},
      success: function(response) {
        $('#incomeTable').html(response);
      }
    });
  }
  loadIncomeTable();

  // Function to fetch expense data and generate the expense table
  function loadExpenseTable() {
    var expense = 'expense';
    $.ajax({
      url: 'addons/getExpenseData',
      type: 'POST',
      data:{expense:expense},
      success: function(response) {
        $('#expenseTable').html(response);
      }
    });
  }
  // Call the functions to load the tables initially
  
  loadExpenseTable();

  //======== show apax graphs ===================

  $(document).ready(function() {
    // Function to fetch income and expense data and create the ApexCharts graph
    function createGraph() {
      $.ajax({
        url: 'addons/getGraphData',
        type: 'POST',
        dataType: 'json', // Specify the expected data type as JSON
        success: function(data) {
          // Extract the income, expense, and profit/loss data from the response
          var incomeData = data.incomeData;
          var expenseData = data.expenseData;
          var profitLossData = data.profitLossData;
  
          // Create the ApexCharts graph
          var options = {
            chart: {
              type: 'bar',
              height: 350
            },
            series: [
              {
                name: 'Income',
                data: incomeData
              },
              {
                name: 'Expense',
                data: expenseData
              },
              {
                name: 'Profit/Loss',
                data: profitLossData
              }
            ],
            xaxis: {
              categories: data.months
            },
            yaxis: {
              labels: {
                formatter: function(value) {
                  // Add currency symbol to the y-axis labels
                  return 'ZMW ' + value.toLocaleString();
                }
              }
            },
            tooltip: {
              y: {
                formatter: function(value) {
                  // Add currency symbol to the tooltip
                  return 'ZMW ' + value.toLocaleString();
                }
              }
            }
          };
  
          var chart = new ApexCharts(document.querySelector('#chartContainer'), options);
          chart.render();
        }
      });
    }

  });
  
// ================= SENDING SMS TO EMPLOYEES ==========
  $(document).ready(function() {
    var employeeTable = $('#employeeTable, #tenantsTable').DataTable({
      // DataTables configuration options go here
      "paging": false,
      "info": false,
      "searching": false
    });

    // Retrieve employee data from the PHP script
    $.getJSON("addons/get_employees", function(data) {
      // Iterate through each employee and create a table row
      $.each(data, function(index, employee) {
        var row = $('<tr>');
        row.append($('<td>').html('<input type="checkbox" class="employeeCheckbox" value="' + employee.phonenumber + '">'));
        row.append($('<td>').text(employee.phonenumber));
        row.append($('<td>').text(employee.firstname));
        row.append($('<td>').text(employee.email));
        employeeTable.row.add(row);
      });

      // Redraw the DataTable with added rows
      employeeTable.draw();

      // Select/Deselect all checkboxes when "Select All" checkbox is clicked
      $('#selectAll').click(function() {
        $('.employeeCheckbox').prop('checked', this.checked);
        updateSendButtonStatus();
      });

      // Enable/disable the "Send SMS/Email" button based on checkbox selection
      $('.employeeCheckbox').click(function() {
        updateSendButtonStatus();
      });
    });

    // Retrieve Tenants data from the PHP script

    // Update the "Send SMS/Email" button status
    function updateSendButtonStatus() {
      $('#sendButton').prop('disabled', $('.employeeCheckbox:checked').length === 0);
    }

    // Handle the form submission
    $('#sendMessageButton').click(function() {
      var messageType = $('#messageType').val();
      var messageContent = $('#messageContent').val();
      var selectedEmployees = [];

      // Get the IDs of selected employees
      $('.employeeCheckbox:checked').each(function() {
        selectedEmployees.push($(this).val());
      });

      
      // Show loading state and disable the button
      $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');

      // Send the selected employees and message data to the server
      $.ajax({
        type: 'POST',
        url: 'addons/send_message',
        data: {
          employees: selectedEmployees,
          messageType: messageType,
          messageContent: messageContent
        },
        dataType: 'json',
        beforeSend: function() {
          // Show loading state and disable the button
          $('#sendMessageButton').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');
        },
        success: function(response) {
          // Handle the response from the server
          alert(response.message);
        },
        complete: function() {
          // Reset the button state after completing the request
          $('#sendMessageButton').prop('disabled', false).html('Send Message');
        }
      });
    });
  });
  



