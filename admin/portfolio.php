<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");

        ?>
            <main>
                <section class="contentContainer">
                    <div class="toppings">
                        <h3>Portfolio</h3>
                        <a href=""><button>Add New</button></a>
                    </div>

                    <div class="tables">
                        <table>
                            <tr>
                                <th class="table_sn">S/N</th>
                                <th>Category</th>
                                <th>Project Title</th>
                                <th>Views</th>
                                <th>Likes</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td class="actions">
                                    <button>View</button>
                                    <button>Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
            </main>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>