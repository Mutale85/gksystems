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
          $("#employee_contract").val(data.employee_contract);
          
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

      $("#problemDate, #agreement_date, #purchase_date, #transaction_date, #dueDate, #datePaid").datepicker({
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
                  alert(response.message);
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
    createGraph();
  });
  
// ================= SENDING SMS TO EMPLOYEES ==========
  $(document).ready(function() {
    var employeeTable = $('#employeeTable').DataTable({
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

  // sms and email tenants
  $(document).ready(function() {
    var tenantTable = $('#tenantTable').DataTable({
      // DataTables configuration options go here
      "paging": false,
      "info": false,
      "searching": false
    });

    // Retrieve tenant data from the PHP script
    $.getJSON("addons/get_tenants", function(data) {
      // Iterate through each tenant and create a table row
      $.each(data, function(index, tenant) {
        var row = $('<tr>');
        row.append($('<td>').html('<input type="checkbox" class="tenantCheckbox" value="' + tenant.phonenumber + '">'));
        row.append($('<td>').text(tenant.phonenumber));
        row.append($('<td>').text(tenant.firstname));
        row.append($('<td>').text(tenant.email));
        tenantTable.row.add(row);
      });

      // Redraw the DataTable with added rows
      tenantTable.draw();

      // Select/Deselect all checkboxes when "Select All" checkbox is clicked
      $('#selectAllTenants').click(function() {
        $('.tenantCheckbox').prop('checked', this.checked);
        updateSendTenantButtonStatus();
      });

      // Enable/disable the "Send SMS/Email" button based on checkbox selection
      $('.tenantCheckbox').click(function() {
        updateSendTenantButtonStatus();
      });
    });

    // Update the "Send SMS/Email" button status
    function updateSendTenantButtonStatus() {
      $('#sendTenantButton').prop('disabled', $('.tenantCheckbox:checked').length === 0);
    }

    // Handle the form submission
    $('#sendTenantButton').click(function() {
      var messageType = $('#messageType').val();
      var messageContent = $('#messageContent').val();
      var selectedTenants = [];

      // Get the IDs of selected tenants
      $('.tenantCheckbox:checked').each(function() {
        selectedTenants.push($(this).val());
      });

      // Show loading state and disable the button
      $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');

      // Send the selected tenants and message data to the server
      $.ajax({
        type: 'POST',
        url: 'addons/send_message_to_tenants',
        data: {
          tenants: selectedTenants,
          messageType: messageType,
          messageContent: messageContent
        },
        dataType: 'json',
        beforeSend: function() {
          // Show loading state and disable the button
          $('#sendTenantButton').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');
        },
        success: function(response) {
          // Handle the response from the server
          alert(response.message);
        },
        error: function(xhr, status, error) {
          // Handle errors, if any
          console.log(error);
        },
        complete: function() {
          // Reset the button state after completing the request
          $('#sendTenantButton').prop('disabled', false).html('Send SMS/Email');
        }
      });
    });
  });


/*
        all about adding vehicle property, view them, editing , income, and

*/
$(document).ready(function() {
    $('#addVehicleForm').submit(function(e) {
        e.preventDefault(); 
        var formData = new FormData(this);
        $.ajax({
            url: 'addons/add_vehicle_asset',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend:function(){
              $("#add_vehicle").html("Processing...");
            },
            success: function(response) {
              console.log(response);
              $("#add_vehicle").html('Add Vehicle');
              alert('Vehicle added successfully!');
              $('#addVehicleForm')[0].reset();
              showLoadedVehicles();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while adding the vehicle.');
            }
        });
    });
});

function showLoadedVehicles(){
    var showVehicles = 'showVehicles';
    $.ajax({
      url: 'addons/fetch_added_vehicles',
      type: 'POST',
      data:{showVehicles:showVehicles},
      success: function(response) {
        $('#showVehicles').html(response);
      }
    });
}
showLoadedVehicles();


//======== edit vehicle
$(document).on('click', '.edit_vehicle', function(e) {
    e.preventDefault();
    var vehicleId = $(this).data('vehicle-id');

    // Send an AJAX request to fetch the data for the selected vehicle
    $.ajax({
      type: 'POST',
      url: 'addons/edit_vehicle', // Replace with the path to your server-side script
      data: { vehicle_id: vehicleId },
      dataType: 'json',
      success: function(response) {
        // Populate the form fields with the retrieved data
        $("#edit_vehicle_btn").click();
        $("#add_vehicle").html("Update Details");
        $('#year').val(response.year);
        $('#vehicle_id').val(response.id);
        $('#make').val(response.make);
        $('#model').val(response.model);
        $('#color').val(response.color);
        $('#license_plate').val(response.license_plate);
        $('#vin').val(response.vin);
        $('#purchase_date').val(response.purchase_date);
        $('#currency').val(response.currency);
        $('#purchase_price').val(response.purchase_price);
        $('#purchase_mileage').val(response.purchase_mileage);
        $('#driver').val(response.driver);
        // Add more form fields if needed
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
});

$(document).on('click', '.vehicle_details', function(e) {
    e.preventDefault();
    var vehicleId = $(this).attr('href');

    $.ajax({
      type: 'POST',
      url: 'addons/fetch_added_vehicles',
      data: { vehicle_id: vehicleId },
      
      success: function(response) {
        // Populate the form fields with the retrieved data
        $("#resultsBtn").click();
        $("#details_modal").html(response);
        $("#resultsModalLabel").text("Vehicle Details"); 
      }
    })
});

/*
   about adding farm property, view them, editing 
*/
// ========= driver posting daily income ====


$(document).ready(function() {
  // Disable form submission if already posted today
  var currentDate = new Date().toISOString().slice(0, 10);
  if (localStorage.getItem('lastPostingDate') === currentDate) {
    $('#incomeForm :input').prop('disabled', true);
  }

  $('#incomeForm').submit(function(e) {
    e.preventDefault();
    var form = $(this);
    if (form[0].checkValidity() === false) {
      e.stopPropagation();
    } else {
      $.ajax({
        url: 'addons/submit_driver_income_form',
        type: 'POST',
        data: form.serialize(),
        success: function(response) {
          console.log(response); 
          alert(response);
          $('#incomeForm :input').prop('disabled', true);
          localStorage.setItem('lastPostingDate', currentDate);
        }
      });
    }
    form.addClass('was-validated');
  });
});

// =========== fetch added vehicle income ==========
function vehicleIncomeTable() {
  var income = 'income';
  $.ajax({
    url: 'addons/fetch_vehicle_income',
    type: 'POST',
    data:{income:income},
    success: function(response) {
      $('#vehicle_income').html(response);
    }
  });
}
vehicleIncomeTable();



$(document).ready(function() {
  var chartType = 'bar'; // Initial chart type

  // Fetch monthly income data from the database via AJAX
  $.ajax({
    url: 'addons/fetch_monthly_income',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      // Generate the chart when data is successfully retrieved
      generateChart(response, chartType);
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.log(error);
    }
  });

  // Function to generate the ApexCharts chart
  function generateChart(data, type) {
    var options = {
      chart: {
        type: type,
        height: 350,
        toolbar: {
          show: false
        }
      },
      series: [{
        name: 'Income',
        data: data
      }],
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      },
      yaxis: {
        title: {
          text: 'Income'
        },
        labels: {
          formatter: function(value) {
            return 'ZMW ' + value.toLocaleString();
          }
        },
        plotOptions: {
          bar: {
            colors: {
              ranges: [{
                from: -Infinity,
                to: Infinity,
                color: '#CDDC39' // Lemon Green
              }]
            }
          }
        }
      }
    };

    var chart = new ApexCharts(document.querySelector('#incomechartContainer'), options);
    chart.render();
  }

  // Function to toggle between chart types
  function toggleChartType() {
    if (chartType === 'bar') {
      chartType = 'line';
    } else {
      chartType = 'bar';
    }

    // Fetch new data and generate the updated chart
    $.ajax({
      url: 'addons/fetch_monthly_income',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        generateChart(response, chartType);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  }

  // Event listener for the chart type button
  $('#chartTypeButton').click(function() {
    toggleChartType();
  });
});

/* Farms properties, adding, display, editing

*/

$(document).ready(function() {
  $('#addFarmForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: 'addons/add_farm_asset',
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend:function(){
        $("#farmBtn").html("Processing...");
      },
      success: function(response) {
        alert(response);
        $("#farmBtn").html("Add Farm");
        showLoadedFarms();
      }
    });
  });
});

function showLoadedFarms(){
    var showFarms = 'showFarms';
    $.ajax({
      url: 'addons/fetch_added_farms',
      type: 'POST',
      data:{showFarms:showFarms},
      success: function(response) {
        $('#showFarms').html(response);
      }
    });
}
showLoadedFarms();


//======== edit vehicle
$(document).on('click', '.edit_farm', function(e) {
    e.preventDefault();
    var farmId = $(this).data('farm-id');

    // Send an AJAX request to fetch the data for the selected farm
    $.ajax({
      type: 'POST',
      url: 'addons/edit_farm', // Replace with the path to your server-side script
      data: { farm_id: farmId },
      dataType: 'json',
      success: function(response) {
        // Populate the form fields with the retrieved data
        $("#addFarmbtn").click();
        $("#farmBtn").html("Update Details");
        $('#activity').val(response.activity);
        $('#location').val(response.location);
        $('#address').val(response.address);
        $('#purchase_amount').val(response.purchase_amount);
        $('#current_value').val(response.current_value);
        $('#purchase_date').val(response.purchase_date);
        $('#farm_size').val(response.farm_size);
        $('#measurement').val(response.measurement);
        $('#currency').val(response.currency_amount);
        $('#currency').val(response.currency_value);
        $('#farm_id').val(response.farm_id);
        // Add more form fields if needed
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
});

$(document).on('click', '.farm_details', function(e) {
    e.preventDefault();
    var farmId = $(this).attr('href');
    $.ajax({
      type: 'POST',
      url: 'addons/fetch_added_farms',
      data: { farm_id: farmId },
      
      success: function(response) {
        $("#resultsBtn").click();
        $("#details_modal").html(response);
        $("#resultsModalLabel").text("Farm Details"); 
      }
    })
});



/*
  Real Estate Addition, Editing, 
*/

$(document).ready(function() {
  $('#addRealEstateForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: 'addons/add_real_estate_asset',
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend:function(){
        $("#real_estateBtn").html("Processing...");
      },
      success: function(response) {
        alert(response);
        $("#real_estateBtn").html("Add Real Estate");
        showLoadedreal_estates();
      }
    });
  });
});

function showLoadedreal_estates(){
    var showreal_estates = 'showreal_estates';
    $.ajax({
      url: 'addons/fetch_added_real_estates',
      type: 'POST',
      data:{showreal_estates:showreal_estates},
      success: function(response) {
        $('#showreal_estates').html(response);
      }
    });
}
showLoadedreal_estates();


//======== edit vehicle
$(document).on('click', '.edit_real_estate', function(e) {
    e.preventDefault();
    var real_estateId = $(this).data('real_estate-id');

    // Send an AJAX request to fetch the data for the selected real_estate
    $.ajax({
      type: 'POST',
      url: 'addons/edit_real_estate', // Replace with the path to your server-side script
      data: { real_estate_id: real_estateId },
      dataType: 'json',
      success: function(response) {
        // Populate the form fields with the retrieved data
        $("#add_real_estateBtn").click();
        $("#real_estateBtn").html("Update Details");
        $('#category').val(response.category);
        $('#condition').val(response.condition);
        $('#location').val(response.location);
        $('#address').val(response.address);
        $('#purchase_amount').val(response.purchase_amount);
        $('#current_value').val(response.current_value);
        $('#currency_amount').val(response.currency);
        $('#currency_value').val(response.currency);
        $('#currency_state').val(response.currency);
        $('#purchase_date').val(response.purchase_date);
        $('#rental_amount').val(response.rental_amount);
        $('#current_state').val(response.current_state);
        $('#estate_id').val(response.estate_id);
        // Add more form fields if needed
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
});

$(document).on('click', '.real_estate_details', function(e) {
    e.preventDefault();
    var real_estateId = $(this).attr('href');
    $.ajax({
      type: 'POST',
      url: 'addons/fetch_added_real_estates',
      data: { real_estateId: real_estateId },
      
      success: function(response) {
        $("#resultsBtn").click();
        $("#details_modal").html(response);
        $("#resultsModalLabel").text("Real Estate Details"); 
      }
    })
});


//============== fetchRentals 

function fetchRentals(house_number){
  $.ajax({
    type: 'POST',
    url: 'addons/fetch_rentals',
    data: { house_number: house_number },
    dataType: 'json',
    success: function(response) {
      
      $('#rentAmount').val(response.rental_amount);
      $('#currency').val(response.currency);
      
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
}


// petty cash  petty cashpetty cash petty cashpetty cash petty cash petty cash petty cash
$(document).ready(function() {
  $('#pettyCashForm').submit(function(event) {
    event.preventDefault(); 
    var formData = $(this).serialize();
    $.ajax({
      url: 'addons/submitPettyCash',
      type: 'POST',
      data: formData,
      success: function(response) {
        // if (response === 'success') {
        //   alert('Form submitted successfully!');
        //   // Clear form fields
          $('#pettyCashForm')[0].reset();
        // } else {
        //   alert('Form submission failed.');
        // }
        alert(response);
        fetchData();
      }
    });
  });
});
  // Fetch and display data in a table
function fetchData() {
  var petty_cash = 'petty_cash';
  $.ajax({
    url: 'addons/fetch_petty_cash',
    type: 'POST',
    data: {petty_cash:petty_cash},
    success: function(data) {
      $('#petty_cash').html(data);
    }
  });
}
fetchData();

$(document).ready(function() {
  $('#loanForm').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'addons/submitLoan',
      data: formData,
      beforeSend:function(){
        $("#loansBtn").html("Processing...");
      },
      success: function(response) {
        alert(response);
        $('#loanForm')[0].reset();
        $("#loansBtn").html("Add Loan");
        displayPostedLoans();
      }
    });
  });
});

function displayPostedLoans() {
  var fetch_loans = 'fetch_loans';
  $.ajax({
    type: 'POST',
    url: 'addons/fetch_loans',
    data:{fetch_loans:fetch_loans},
    success: function(response) {
      $('#postedLoans').html(response);
    }
  });
}



$(document).on("click", ".edit_loan", function(e){
  e.preventDefault();
  var loan_id = $(this).attr("href");
  $.ajax({
    url:"addons/editLoan",
    method:"post",
    data:{loan_id:loan_id},
    dataType:'Json',
    success:function(loanData){
      $("#loanBtn").click();
      $("#add_loan").html("Update Details");
      $("#loan_id").val(loanData.id);
      $('#currency').val(loanData.currency);
      $('#loanType').val(loanData.loan_type);
      $('#creditor').val(loanData.creditor);
      $('#amount').val(loanData.amount);
      $('#currency').val(loanData.currency);
      $('#dueDate').val(loanData.due_date);
      $('#status').val(loanData.status);

    }
  })
})

$(document).on("click", ".add_payment", function(e){
  e.preventDefault();
  var loan_id = $(this).attr("href");
  $("#paymentbtn").click();
  $("#loanId").val(loan_id);
})

// loan payment 

$(document).ready(function() {
  $('#paymentForm').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'addons/submitLoanPayment',
      data: formData,
      beforeSend:function(){
        $("#submit_paymentBtn").html("Processing...");
      },
      success: function(response) {
        alert(response);
        $('#paymentForm')[0].reset();
        $("#submit_paymentBtn").html("Add Loan");
        displayPostedLoans();
      }
    });
  });
});



$(document).on("click", ".view_loan_payments", function(e){
  e.preventDefault();
  var loan_id = $(this).attr("href");
  $("#resultsBtn").click();
  $.ajax({
      url: "addons/fetch_loan_payments",
      method:"post",
      data:{loan_id:loan_id},
      success:function(data){
          $("#details_modal").html(data);
      }
  })
})





  



