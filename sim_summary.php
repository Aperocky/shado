<?php
    session_start();
    $page_title = "Print Report";
    $html_head_insertions .= '<script src="http://d3js.org/d3.v3.min.js"></script>';
    $html_head_insertions .= '<script type="text/javascript" src="includes/results/d3_graph.js"></script>';
    $html_head_insertions .= '<script type="text/javascript" src="includes/results/PrintReport/print_page.js"></script>';
    require_once('includes/page_parts/header.php');
    require_once('includes/page_parts/side_navigation.php');
    require_once('operator_calculations.php');
    require_once('includes/results/graph_CsvFile.php');
    require_once('includes/results/graphTextBox/graph_navBar_static.php');
?>

    <div id="print-content">
        <form>
            <div id="next_page" class="printPdf" onclick="var submit = getElementById('button'); button.click()" style="cursor: pointer;">
            </div>
            <input type="button" id="button" onclick="printDiv('print-content')" value="print a div!" style='display:none;'/>
        </form>

<?php
    require_once("operator_calculations.php");
    require_once("operator.html");

    function createSummary($user) {
        echo "<br><br>";
        require_once("input_summary.php");
        echo "<br><br><br>";
        include('includes/results/d3_graph.php');
        createGraphCsv($user);
        graphTextStatic($_SESSION['session_dir'] . $user. '_stats.csv');
    }

    createSummary("Engineer");

    if ($_SESSION['operator1'] == 1) {
        createSummary("Conductor");
    }

	require_once("includes/page_parts/footer.php");
?>
