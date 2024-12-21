    <!-- Boostra 5 offline Js link Start--- -->
    <script src="bootstrap5 project/js/bootstrap.min.js"></script>
    <!-- Boostra 5 offline Js link End--- -->

      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });

</script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="./index.js"></script>
    <!-- -------------Invoice from Js ------------------->
     <script>
      function GetPrint()
      {
        window.print();
      }
     </script>


<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function updateCounts() {
        $.ajax({
            url: 'fetch_counts.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#totalClients').text(client);
                $('#totalCases').text(data.total_cases);
                $('#totalAppointments').text(data.total_appointments);
            },
            error: function(error) {
                console.log('Error fetching counts:', error);
            }
        });
    }

    // Update counts every 5 seconds
    setInterval(updateCounts, 5000);
</script>

</body>
</html>