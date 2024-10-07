<?php
session_start();

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../");
    exit();
}

include '../../database/config.php';

// Fetch data admin
$failed_sql_admin = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'admin' ORDER BY id DESC LIMIT 30";
$failed_result_admin = $conn->query($failed_sql_admin);
$successful_sql_admin = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'admin' ORDER BY id DESC";
$successful_result_admin = $conn->query($successful_sql_admin);

// Fetch data guidance
$failed_sql_guidance = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'guidance' ORDER BY id DESC LIMIT 30";
$failed_result_guidance = $conn->query($failed_sql_guidance);
$successful_sql_guidance = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'guidance' ORDER BY id DESC LIMIT 30";
$successful_result_guidance = $conn->query($successful_sql_guidance);

//Fetch data bsit
$failed_sql_bsit = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'bsit' ORDER BY id DESC LIMIT 30";
$failed_result_bsit = $conn->query($failed_sql_bsit);
$successful_sql_bsit = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'bsit' ORDER BY id DESC LIMIT 30";
$successful_result_bsit = $conn->query($successful_sql_bsit);

//Fetch data bshm
$failed_sql_bshm = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'bshm' ORDER BY id DESC LIMIT 30";
$failed_result_bshm = $conn->query($failed_sql_bshm);
$successful_sql_bshm = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'bshm' ORDER BY id DESC LIMIT 30";
$successful_result_bshm = $conn->query($successful_sql_bshm);

//Fetch data bsba
$failed_sql_bsba = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'bsba' ORDER BY id DESC LIMIT 30";
$failed_result_bsba = $conn->query($failed_sql_bsba);
$successful_sql_bsba = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'bsba' ORDER BY id DESC LIMIT 30";
$successful_result_bsba = $conn->query($successful_sql_bsba);

//Fetch data bsed
$failed_sql_bsed = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'bsed' ORDER BY id DESC LIMIT 30";
$failed_result_bsed = $conn->query($failed_sql_bsed);
$successful_sql_bsed = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'bsed' ORDER BY id DESC LIMIT 30";
$successful_result_bsed = $conn->query($successful_sql_bsed);

//Fetch data beed
$failed_sql_beed = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'beed' ORDER BY id DESC LIMIT 30";
$failed_result_beed = $conn->query($failed_sql_beed);
$successful_sql_beed = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'beed' ORDER BY id DESC LIMIT 30";
$successful_result_beed = $conn->query($successful_sql_beed);

//Fetch data registrar
$failed_sql_registrar = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'registrar' ORDER BY id DESC LIMIT 30";
$failed_result_registrar = $conn->query($failed_sql_registrar);
$successful_sql_registrar = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'registrar' ORDER BY id DESC LIMIT 30";
$successful_result_registrar = $conn->query($successful_sql_registrar);

//Fetch data id
$failed_sql_id = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'id' ORDER BY id DESC LIMIT 30";
$failed_result_id = $conn->query($failed_sql_id);
$successful_sql_id = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'id' ORDER BY id DESC LIMIT 30";
$successful_result_id = $conn->query($successful_sql_id);

//Fetch data cor
$failed_sql_cor = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'cor' ORDER BY id DESC LIMIT 30";
$failed_result_cor = $conn->query($failed_sql_cor);
$successful_sql_cor = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'cor' ORDER BY id DESC LIMIT 30";
$successful_result_cor = $conn->query($successful_sql_cor);

//Fetch data student
$failed_sql_student = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'failed' AND portal = 'student' ORDER BY id DESC LIMIT 30";
$failed_result_student = $conn->query($failed_sql_student);
$successful_sql_student = "SELECT attemp, portal, location, com_location FROM login_logs WHERE type = 'success' AND portal = 'student' ORDER BY id DESC LIMIT 30";
$successful_result_student = $conn->query($successful_sql_student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attempt Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Attempt Log</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="attemptLogsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="failed-attempts-tab" data-bs-toggle="tab" href="#failed-attempts-admin" role="tab" aria-controls="failed-attempts-admin" aria-selected="true">Failed Attempts (Admin)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab" data-bs-toggle="tab" href="#successful-attempts-admin" role="tab" aria-controls="successful-attempts-admin" aria-selected="false">Success Attempts (Admin)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-guidance" data-bs-toggle="tab" href="#failed-attempts-guidance" role="tab" aria-controls="failed-attempts-guidance" aria-selected="false">Failed Attempts (Guidance)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-guidance" data-bs-toggle="tab" href="#successful-attempts-guidance" role="tab" aria-controls="successful-attempts-guidance" aria-selected="false">Success Attempts (Guidance)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-bsit" data-bs-toggle="tab" href="#failed-attempts-bsit" role="tab" aria-controls="failed-attempts-bsit" aria-selected="false">Failed Attempts (BSIT)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-bsit" data-bs-toggle="tab" href="#successful-attempts-bsit" role="tab" aria-controls="successful-attempts-bsit" aria-selected="false">Success Attempts (BSIT)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-bshm" data-bs-toggle="tab" href="#failed-attempts-bshm" role="tab" aria-controls="failed-attempts-bshm" aria-selected="false">Failed Attempts (BSHM)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-bshm" data-bs-toggle="tab" href="#successful-attempts-bshm" role="tab" aria-controls="successful-attempts-bshm" aria-selected="false">Success Attempts (BSHM)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-bsba" data-bs-toggle="tab" href="#failed-attempts-bsba" role="tab" aria-controls="failed-attempts-bsba" aria-selected="false">Failed Attempts (BSBA)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-bsba" data-bs-toggle="tab" href="#successful-attempts-bsba" role="tab" aria-controls="successful-attempts-bsba" aria-selected="false">Success Attempts (BSBA)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-bsed" data-bs-toggle="tab" href="#failed-attempts-bsed" role="tab" aria-controls="failed-attempts-bsed" aria-selected="false">Failed Attempts (BSED)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-bsed" data-bs-toggle="tab" href="#successful-attempts-bsed" role="tab" aria-controls="successful-attempts-bsed" aria-selected="false">Success Attempts (BSED)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-beed" data-bs-toggle="tab" href="#failed-attempts-beed" role="tab" aria-controls="failed-attempts-beed" aria-selected="false">Failed Attempts (BEED)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-beed" data-bs-toggle="tab" href="#successful-attempts-beed" role="tab" aria-controls="successful-attempts-beed" aria-selected="false">Success Attempts (BEED)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-registrar" data-bs-toggle="tab" href="#failed-attempts-registrar" role="tab" aria-controls="failed-attempts-registrar" aria-selected="false">Failed Attempts (Registrar)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-registrar" data-bs-toggle="tab" href="#successful-attempts-registrar" role="tab" aria-controls="successful-attempts-registrar" aria-selected="false">Success Attempts (Registrar)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-id" data-bs-toggle="tab" href="#failed-attempts-id" role="tab" aria-controls="failed-attempts-id" aria-selected="false">Failed Attempts (ID)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-id" data-bs-toggle="tab" href="#successful-attempts-id" role="tab" aria-controls="successful-attempts-id" aria-selected="false">Success Attempts (ID)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-cor" data-bs-toggle="tab" href="#failed-attempts-cor" role="tab" aria-controls="failed-attempts-cor" aria-selected="false">Failed Attempts (COR)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-cor" data-bs-toggle="tab" href="#successful-attempts-cor" role="tab" aria-controls="successful-attempts-cor" aria-selected="false">Success Attempts (COR)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="failed-attempts-tab-student" data-bs-toggle="tab" href="#failed-attempts-student" role="tab" aria-controls="failed-attempts-student" aria-selected="false">Failed Attempts (Student)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="successful-attempts-tab-student" data-bs-toggle="tab" href="#successful-attempts-student" role="tab" aria-controls="successful-attempts-student" aria-selected="false">Success Attempts (Student)</a>
        </li>
    </ul>

    <div class="tab-content" id="attemptLogsTabsContent">
        <!-- Failed Attempts Tab (Admin) -->
        <div class="tab-pane fade show active" id="failed-attempts-admin" role="tabpanel" aria-labelledby="failed-attempts-tab">
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
                    <?php if ($failed_result_admin->num_rows > 0): ?>
                        <?php while($row = $failed_result_admin->fetch_assoc()): ?>
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

        <!-- Successful Attempts Tab (Admin) -->
        <div class="tab-pane fade" id="successful-attempts-admin" role="tabpanel" aria-labelledby="successful-attempts-tab">
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
                    <?php if ($successful_result_admin->num_rows > 0): ?>
                        <?php while($row = $successful_result_admin->fetch_assoc()): ?>
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

        <!-- Failed Attempts Tab (Guidance) -->
        <div class="tab-pane fade" id="failed-attempts-guidance" role="tabpanel" aria-labelledby="failed-attempts-tab-guidance">
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
                            <td colspan="4" class="text-center">No failed attempts found (Guidance)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (Guidance) -->
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
                            <td colspan="4" class="text-center">No successful attempts found (Guidance)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (BSIT) -->
        <div class="tab-pane fade" id="failed-attempts-bsit" role="tabpanel" aria-labelledby="failed-attempts-tab-bsit">
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
                    <?php if ($failed_result_bsit->num_rows > 0): ?>
                        <?php while($row = $failed_result_bsit->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (BSIT)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (BSIT) -->
        <div class="tab-pane fade" id="successful-attempts-bsit" role="tabpanel" aria-labelledby="successful-attempts-tab-bsit">
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
                    <?php if ($successful_result_bsit->num_rows > 0): ?>
                        <?php while($row = $successful_result_bsit->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (BSIT)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (BSHM) -->
        <div class="tab-pane fade" id="failed-attempts-bshm" role="tabpanel" aria-labelledby="failed-attempts-tab-bshm">
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
                    <?php if ($failed_result_bshm->num_rows > 0): ?>
                        <?php while($row = $failed_result_bshm->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (BSHM)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (BSHM) -->
        <div class="tab-pane fade" id="successful-attempts-bshm" role="tabpanel" aria-labelledby="successful-attempts-tab-bshm">
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
                    <?php if ($successful_result_bshm->num_rows > 0): ?>
                        <?php while($row = $successful_result_bshm->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (BSHM)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (BSBA) -->
        <div class="tab-pane fade" id="failed-attempts-bsba" role="tabpanel" aria-labelledby="failed-attempts-tab-bsba">
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
                    <?php if ($failed_result_bsba->num_rows > 0): ?>
                        <?php while($row = $failed_result_bsba->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (BSBA)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (BSBA) -->
        <div class="tab-pane fade" id="successful-attempts-bsba" role="tabpanel" aria-labelledby="successful-attempts-tab-bsba">
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
                    <?php if ($successful_result_bsba->num_rows > 0): ?>
                        <?php while($row = $successful_result_bsba->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (BSBA)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (BSED) -->
        <div class="tab-pane fade" id="failed-attempts-bsed" role="tabpanel" aria-labelledby="failed-attempts-tab-bsed">
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
                    <?php if ($failed_result_bsed->num_rows > 0): ?>
                        <?php while($row = $failed_result_bsed->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (BSED)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (BSED) -->
        <div class="tab-pane fade" id="successful-attempts-bsed" role="tabpanel" aria-labelledby="successful-attempts-tab-bsed">
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
                    <?php if ($successful_result_bsed->num_rows > 0): ?>
                        <?php while($row = $successful_result_bsed->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (BSED)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (BEED) -->
        <div class="tab-pane fade" id="failed-attempts-beed" role="tabpanel" aria-labelledby="failed-attempts-tab-beed">
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
                    <?php if ($failed_result_beed->num_rows > 0): ?>
                        <?php while($row = $failed_result_beed->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (BEED)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (BEED) -->
        <div class="tab-pane fade" id="successful-attempts-beed" role="tabpanel" aria-labelledby="successful-attempts-tab-beed">
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
                    <?php if ($successful_result_beed->num_rows > 0): ?>
                        <?php while($row = $successful_result_beed->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (BEED)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (Registrar) -->
        <div class="tab-pane fade" id="failed-attempts-registrar" role="tabpanel" aria-labelledby="failed-attempts-tab-registrar">
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
                    <?php if ($failed_result_registrar->num_rows > 0): ?>
                        <?php while($row = $failed_result_registrar->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (Registrar)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (Registrar) -->
        <div class="tab-pane fade" id="successful-attempts-registrar" role="tabpanel" aria-labelledby="successful-attempts-tab-registrar">
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
                    <?php if ($successful_result_registrar->num_rows > 0): ?>
                        <?php while($row = $successful_result_registrar->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (Registrar)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (ID) -->
        <div class="tab-pane fade" id="failed-attempts-id" role="tabpanel" aria-labelledby="failed-attempts-tab-id">
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
                    <?php if ($failed_result_id->num_rows > 0): ?>
                        <?php while($row = $failed_result_id->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (ID)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (ID) -->
        <div class="tab-pane fade" id="successful-attempts-id" role="tabpanel" aria-labelledby="successful-attempts-tab-id">
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
                    <?php if ($successful_result_id->num_rows > 0): ?>
                        <?php while($row = $successful_result_id->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (ID)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (COR) -->
        <div class="tab-pane fade" id="failed-attempts-cor" role="tabpanel" aria-labelledby="failed-attempts-tab-cor">
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
                    <?php if ($failed_result_cor->num_rows > 0): ?>
                        <?php while($row = $failed_result_cor->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (COR)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (COR) -->
        <div class="tab-pane fade" id="successful-attempts-cor" role="tabpanel" aria-labelledby="successful-attempts-tab-cor">
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
                    <?php if ($successful_result_cor->num_rows > 0): ?>
                        <?php while($row = $successful_result_cor->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (COR)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Failed Attempts Tab (Student) -->
        <div class="tab-pane fade" id="failed-attempts-student" role="tabpanel" aria-labelledby="failed-attempts-tab-student">
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
                    <?php if ($failed_result_student->num_rows > 0): ?>
                        <?php while($row = $failed_result_student->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No failed attempts found (Student)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Successful Attempts Tab (Student) -->
        <div class="tab-pane fade" id="successful-attempts-student" role="tabpanel" aria-labelledby="successful-attempts-tab-student">
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
                    <?php if ($successful_result_student->num_rows > 0): ?>
                        <?php while($row = $successful_result_student->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['attemp']); ?></td>
                                <td><?php echo htmlspecialchars($row['portal']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo htmlspecialchars($row['com_location']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No successful attempts found (Student)</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
