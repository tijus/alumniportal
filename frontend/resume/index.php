<?php
require('fpdf/fpdf.php');
require($_SERVER['DOCUMENT_ROOT']. '/portal/common/config/config.php');

                
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user.*, basic_info.*, educational_details.*, 
                   projects.*, technical_proficiency.*,work_experience.*
FROM user
LEFT JOIN (SELECT *
      FROM basic_info
      GROUP BY basic_info_id) basic_info
ON basic_info.basic_info_id = user.id
LEFT JOIN (SELECT *
      FROM educational_details
      GROUP BY edu_det_id) educational_details
ON educational_details.edu_det_id = user.id
LEFT JOIN (SELECT *
      FROM projects
      GROUP BY proj_id) projects
ON projects.proj_id = user.id
LEFT JOIN (SELECT *
      FROM technical_proficiency
      GROUP BY tech_prof_id) technical_proficiency
ON technical_proficiency.tech_prof_id = user.id
LEFT JOIN (SELECT *
      FROM work_experience
      GROUP BY work_exp_id) work_experience
ON work_experience.work_exp_id = user.id where user.id='".$_GET["id"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name=$row["first_name"]." ".$row["last_name"];
        $email=$row["email"];
        $gender=$row["gender"];
        $dob=$row["DOB"];
        $address=$row["permanent_address"];
        $hobbies=$row["hobbies"];
        $mobile_no=$row["mobile_no"];
        $project_domain = $row["domain"];
        $project_desc = $row["description"];
        $technical_proficiency = $row["skill"];
    }
} else {
    echo "0 results";
}


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('somaiya.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(65,25,'K. J. Somaiya Institute Of Engineering and Information Technology',0,0,'C');
    // Line break
    $this->Ln(30);
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(38,7,$col,1,0,'C',true);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(38,15,$col,1,0,'C');
        $this->Ln();
    }
}

// Simple table
function SemTable($sem, $data)
{
    // Header
    foreach($sem as $col)
        $this->Cell(23.75,7,$col,1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(23.75,15,$col,1,0,'C');
        $this->Ln();
    }
}

function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Cell(40,5,"Name:",0,0,'L');
$pdf->Cell(0,5,$name,0,0,'L');
$pdf->Cell(0,5,"Email ID:".$email,0,1,'R');
$pdf->Cell(40,5,"Gender:",0,0,'L');
$pdf->Cell(0,5,$gender,0,0,'L');
$pdf->Cell(0,5,"Mobile:".$mobile_no,0,1,'R');
$pdf->Cell(40,5,"Date of Birth:",0,0,'L');
$pdf->Cell(0,5,$dob,0,1,'L');
$pdf->Cell(40,5,"Languages Known:",0,0,'L');
$pdf->Cell(0,5,"Hindi,English,Marathi",0,1,'L');
$pdf->Cell(40,5,"Address:",0,0,'L');
$pdf->Cell(0,5,$address,0,0,'L');
// Line break
    $pdf->Ln(7);
$pdf->SetFillColor(200,220,255);    
$pdf->Cell(0,8,'Career Objective:',1,1,'L',true);
$pdf->Write(5,'Seeking for a challenging position as a professional, where in given chance of proving my skills.');
// Line break
$pdf->Ln(8);
$pdf->Cell(0,8,'Education:',1,1,'L',true);
$pdf->Ln(2);
$sem = array('Semester 1','Semester 2','Semester 3','Semester 4','Semester 5','Semester 6','Semester 7','Semester 8');
$data = array(
    array('11','11','11','11','11','11','11','11'),
    );
//$data = $pdf->LoadData('countries.txt');    
$pdf->SemTable($sem,$data);
$pdf->Ln(2);
$pdf->Cell(0,8,'Pre Engineering:',1,1,'L',true);
$pdf->Ln(1);
$header = array('Exam Passed', 'Institue', 'Board/University', 'Year', 'Percentage');
// Data loading
$data = array(
    array('11','11','11','11','11'),
    );

//$data = $pdf->LoadData('countries.txt');    
$pdf->BasicTable($header,$data);
// Line break
    $pdf->Ln(7);
$pdf->Cell(0,8,'Projects:',1,1,'L',true);
$pdf->Ln(1);
$pdf->Write(5,'College Project: '. $project_domain);
    $pdf->Ln(5);
$pdf->Write(5,'Description: '.$project_desc);
$pdf->Ln(10);
//$pdf->Write(5,"Mini Project: Design & Development of Sharp Beam High Gain linearly Polarized Microstrip array .Antenna using Microstrip feed line (2.45 GHz)");
  //  $pdf->Ln(5);
//$pdf->Write(5,'Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos perferendis eveniet, laudantium accusamus, porro ducimus hic eum aspernatur incidunt voluptas consectetur facilis asperiores ipsam ut rem cumque voluptate libero numquam.');
//$pdf->Ln(5);
//$pdf->Ln(10);
//$pdf->Write(5,"Internship: Design & Development of Sharp Beam High Gain linearly Polarized Microstrip array .Antenna using Microstrip feed line (2.45 GHz)");
  //  $pdf->Ln(5);
//$pdf->Write(5,'Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos perferendis eveniet, laudantium accusamus, porro ducimus hic eum aspernatur incidunt voluptas consectetur facilis asperiores ipsam ut rem cumque voluptate libero numquam.');
//$pdf->Ln(10);
// Line break
    $pdf->Ln(7);
$pdf->Cell(0,8,'Technical Proficiency:',1,1,'L',true);
$pdf->Cell(0,10,$technical_proficiency,0,1,'L');
//$pdf->Cell(0,10,'Languages: Java, Basics of PYTHON, C. ',0,1,'L');
//$pdf->Cell(0,10,'Languages: Java, Basics of PYTHON, C. ',0,1,'L');
//$pdf->Cell(0,10,'Languages: Java, Basics of PYTHON, C. ',0,1,'L');
$pdf->Ln(2);
$pdf->Cell(0,8,'Award(s)/ Achievement(s) / Post(s) of Responsibilities:',1,1,'L',true);
$pdf->Cell(0,10,'Students council Joint technical secretary',0,1,'L');
$pdf->Cell(0,10,'Csi Joint technical head',0,1,'L');
$pdf->Cell(0,10,'Alumni portal ',0,1,'L');

// Line break
    $pdf->Ln(7);
$pdf->Cell(0,8,'Hobbies:',1,1,'L',true);
$pdf->Cell(0,10,$hobbies,0,1,'L');


// Line break
    $pdf->Ln(7);
$pdf->Cell(0,8,'Declaration:',0,1,'L');
$pdf->Ln(7);
$pdf->Cell(0,5,'I hereby declare that above furnished particulars are true to the best of my knowledge and belief.',0,1,'R');

// Line break
    $pdf->Ln(18);
$today = date("m.d.Y");
$pdf->Cell(0,5,'Place : ',0,1,'L');
$pdf->Cell(0,5,"Date : {$today}",0,0,'L'); 
$pdf->Cell(0,5,$name,0,1,'R');

$pdf->Output();


$conn->close();