<?php
session_start();

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../");
    exit();
}

include '../../database/config.php';

// Fetch data admin
$failed_sql = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' ORDER BY id DESC LIMIT 30";
$failed_result = $conn->query($failed_sql);
$successful_sql = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' ORDER BY id DESC LIMIT 30";
$successful_result = $conn->query($successful_sql);

// Fetch data guidance
$failed_sql_guidance = "SELECT attemp, portal, location, com_location FROM login_logs_guidance WHERE type = 'failed' ORDER BY id DESC LIMIT 30";
$failed_result_guidance = $conn->query($failed_sql_guidance);
$successful_sql_guidance = "SELECT attemp, portal, location, com_location FROM login_logs_guidance WHERE type = 'success' ORDER BY id DESC LIMIT 30";
$successful_result_guidance = $conn->query($successful_sql_guidance);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attemp Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Attemp Log</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="attemptLogsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="failed-attempts-tab" data-bs-toggle="tab" href="#failed-attempts" role="tab" aria-controls="failed-attempts" aria-selected="true">Failed Attempts (Admin)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab" data-bs-toggle="tab" href="#successful-attempts" role="tab" aria-controls="successful-attempts" aria-selected="false">Success Attempts (Admin)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="failed-attempts-tab-guidance" data-bs-toggle="tab" href="#failed-attempts-guidance" role="tab" aria-controls="failed-attempts-guidance" aria-selected="true">Failed Attempts (Guidance)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-guidance" data-bs-toggle="tab" href="#successful-attempts-guidance" role="tab" aria-controls="successful-attempts-guidance" aria-selected="false">Success Attempts (Guidance)</a>
        </li>
    </ul>

    <div class="tab-content" id="attemptLogsTabsContent">
        <!-- Failed Attempts Tab Admin -->
        <div class="tab-pane fade show active" id="failed-attempts" role="tabpanel" aria-labelledby="failed-attempts-tab">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Use Attempt</th>
                        <th>Portal</th>
                        <th>Location</th>
                        <th>Complete Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($failed_result->num_rows > 0): ?>
                        <?php while($row = $failed_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab Admin-->
        <div class="tab-pane fade" id="successful-attempts" role="tabpanel" aria-labelledby="successful-attempts-tab">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Use Attempt</th>
                        <th>Portal</th>
                        <th>Location</th>
                        <th>Complete Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($successful_result->num_rows > 0): ?>
                        <?php while($row = $successful_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab Guidance -->
        <div class="tab-pane fade show active" id="failed-attempts-guidance" role="tabpanel" aria-labelledby="failed-attempts-tab-guidance">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Use Attempt</th>
                        <th>Portal</th>
                        <th>Location</th>
                        <th>Complete Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($failed_result_guidance->num_rows > 0): ?>
                        <?php while($row = $failed_result_guidance->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab Guidance-->
        <div class="tab-pane fade" id="successful-attempts-guidance" role="tabpanel" aria-labelledby="successful-attempts-tab-guidance">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Use Attempt</th>
                        <th>Portal</th>
                        <th>Location</th>
                        <th>Complete Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($successful_result_guidance->num_rows > 0): ?>
                        <?php while($row = $successful_result_guidance->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
