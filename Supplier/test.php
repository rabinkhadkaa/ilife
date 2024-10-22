<?php
    if($xmlError == ''){
        require_once(SITE_ROOT.'lib/Diff/Renderer/HTML/SideBySide.php');
        $renderer = new Diff_Renderer_HTML_SideBySide();

        //Example of applying classes based comparison status
        $updateClass = 'highlight-update';
        $newClass = 'highlight-new';
        $removedClass = 'highlight-removed';

        echo "<div class ='$updateClass'>";
        echo $diff_total->Render($renderer, array('left_caption'=>'Invoice Total', 'right_caption'=>'PO Total','compare_status'=>$compare_status));
        echo "</div>";
        echo "<div class ='$newClass'>";
        echo $diff_charge->Render($renderer, array('left_caption'=>'Invoice Charge', 'right_caption'=>'PO Charge','compare_status'=>$compare_status));
        echo "</div>";
    }
?>