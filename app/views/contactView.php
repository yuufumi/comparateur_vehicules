<?php
class contactView extends View{
    public function __construct($data){
        $this->setData($data);
        $this->navbar();
        $this->contact($data);
        $this->footer();
    }

    protected function contact($data){
        echo '<section class="container-fluid px-5" style="padding-top:30px;padding-bottom:30px;">
        <h1 class="mx-5 pt-5" style="color:#3B0000;font-weight:bold;font-size:66px;">Contacts</h1>

            <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
                <thead>
                <th>Type de contact</th>
                <th>Cordonnées</th>
                </thead>
                <tbody>';
                foreach($data['contact'] as $row){
                        echo "<tr>";
                        echo "<td>".$row->name."</td>";
                        echo "<td>";
                        if (strpos($row->value,'https')===0){ echo "<a href=".$row->value.">".$row->value."</a>";}else{ echo $row->value;}
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo '
                </tbody>
            </table>
        </section>';
    }
}
?>


