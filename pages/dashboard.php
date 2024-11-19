<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
    <?php 
        include_once '../config.php';
    ?>
</head>
<body>
    <header class="header_container">
        <div class="wrapper">
            <span>UserName</span>
            <ul>
                <li><a href="<?php BASE_URL ?>/pages/dashboard.php">Home</a></li>
                <li><a href="<?php BASE_URL ?>/pages/file.php">File</a></li>
                <li><a href="<?php BASE_URL ?>/pages/faq.php">Faq</a></li>
                <li><a href="<?php BASE_URL ?>/pages/settings.php">Settings</a></li>
            </ul>
            <button>log out</button>
        </div>
    </header>
    <section class="dashboard_wrapper">
        <div class="number_data_container">
            <div class="total_file_sent">
                <h6>Total file recieved: </h6> <small> </small>
                <!-- <div class="divide_line"></div> -->
                <span>123</span>
            </div>
            <div class="total_file_recieved">
                <h6>Total file Sent: </h6> <small> </small>
                <!-- <div class="divide_line"></div> -->
                <span>343</span>
            </div>
        </div>
        <div class="data_grap_wrapper">
            <div class="grap_container">
                <div>
                    <canvas id="myChart"></canvas>
                  </div>
            </div>
        </div>
    </section>
    <section class="history_wrapper">
        <h3 class="history_header">Latest file transaction History</h3>
        <div class="history_container">
            <table class="history_table">
                <th class="table_title">Date</th>
                <th class="table_title">Process</th>
                <th class="table_title">File Name</th>
                <th class="table_title">File Type</th>
                <th class="table_title">Status</th>
                <tbody>
                    <tr class="table_row">
                        <td class="table_data">2 aug, 2003</td>
                        <td class="table_data">Sent</td>
                        <td class="table_data">List of staff</td>
                        <td class="table_data">Pdf</td>
                        <td class="table_data">Opened</td>
                    </tr>
                    <tr class="table_row">
                        <td class="table_data">2 aug, 2003</td>
                        <td class="table_data">Sent</td>
                        <td class="table_data">List of staff</td>
                        <td class="table_data">Pdf</td>
                        <td class="table_data">Opened</td>
                    </tr>
                    <tr>
                        <td class="table_data">2 Nov, 2003</td>
                        <td class="table_data">recieved</td>
                        <td class="table_data">List of staff</td>
                        <td class="table_data">word</td>
                        <td class="table_data">Not Opened</td>
                    </tr>
                    <tr>
                        <td class="table_data">2 Nov, 2003</td>
                        <td class="table_data">recieved</td>
                        <td class="table_data">List of staff</td>
                        <td class="table_data">word</td>
                        <td class="table_data">Not Opened</td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination">
                <button id="prev-page" onclick="changePage('prev')">Previous</button>
                <span id="page-numbers">
                    <a href="#" class="page-link" onclick="goToPage(1)">1</a>
                    <a href="#" class="page-link" onclick="goToPage(2)">2</a>
                    <a href="#" class="page-link" onclick="goToPage(3)">3</a>
                    <!-- Add more page links dynamically if needed -->
                </span>
                <button id="next-page" onclick="changePage('next')">Next</button>
            </div>
        </div>
    </section>
    <footer>
        <p>all right reserved @ daha</p>
    </footer>

    <script>
        // Data for comparison
        const labels = ['monday', 'tuesday', 'wensday', 'thursday', 'friday', 'satuday', 'sunday'];
        const fileSent = [10, 20, 50, 30, 25, 10, 50];  // Dataset 1
        const fileRecived = [5, 15, 10, 40, 30, 60, 10];   // Dataset 2

        const ctx = document.getElementById('myChart').getContext('2d');

        // Create the bar chart
        const myChart = new Chart(ctx, {
            type: 'bar',  // Set chart type to bar
            data: {
                labels: labels,  // x-axis labels
                datasets: [
                    {
                        label: 'file sent',
                        data: fileSent,  // Data for the first value
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',  // Color for bars
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'file recived',
                        data: fileRecived,  // Data for the second value
                        backgroundColor: '#228b22',  // Color for bars
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Days'
                        }
                    },
                    y: {
                        beginAtZero: true,  // Make sure y-axis starts at 0
                        title: {
                            display: true,
                            text: 'Number of files'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'  // Position the legend at the top
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                },
                barThickness: 30  // Optional: Adjust bar thickness
            }
        });
    </script>

</body>

</html>