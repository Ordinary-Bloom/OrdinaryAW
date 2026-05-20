<?php
/**
 * Twilight Echoes — OrdinaryBloom Soundscape Guide
 * Genera y descarga un PDF sin librerías externas.
 * Compatible con todos los navegadores modernos.
 */

// ── Limpiar cualquier output previo y deshabilitar compresión ─────────────────
while (ob_get_level()) ob_end_clean();

// ── Helpers ───────────────────────────────────────────────────────────────────

function pdfEsc(string $text): string {
    $out = '';
    for ($i = 0, $len = strlen($text); $i < $len; $i++) {
        $c = ord($text[$i]);
        if ($c === 40 || $c === 41 || $c === 92) {
            $out .= '\\' . chr($c);
        } elseif ($c >= 32 && $c <= 126) {
            $out .= chr($c);
        } else {
            $out .= sprintf('\\%03o', $c);
        }
    }
    return '(' . $out . ')';
}

function txt(string $font, float $size, float $x, float $y, string $text, array $rgb): string {
    [$r, $g, $b] = $rgb;
    return "q {$r} {$g} {$b} rg BT /{$font} {$size} Tf {$x} {$y} Td " . pdfEsc($text) . " Tj ET Q\n";
}

function hLine(float $y, float $x1, float $x2, array $rgb, float $w = 0.5): string {
    [$r, $g, $b] = $rgb;
    return "q {$r} {$g} {$b} RG {$w} w {$x1} {$y} m {$x2} {$y} l S Q\n";
}

function rect(float $x, float $y, float $w, float $h, array $rgb): string {
    [$r, $g, $b] = $rgb;
    return "q {$r} {$g} {$b} rg {$x} {$y} {$w} {$h} re f Q\n";
}

function circle(float $cx, float $cy, float $r, array $rgb): string {
    [$r1, $g, $b] = $rgb;
    $k  = 0.552284749831;
    $rk = $r * $k;
    return "q {$r1} {$g} {$b} rg "
        . "{$cx} " . ($cy + $r) . " m "
        . ($cx + $rk) . " " . ($cy + $r) . " " . ($cx + $r) . " " . ($cy + $rk) . " " . ($cx + $r) . " {$cy} c "
        . ($cx + $r) . " " . ($cy - $rk) . " " . ($cx + $rk) . " " . ($cy - $r) . " {$cx} " . ($cy - $r) . " c "
        . ($cx - $rk) . " " . ($cy - $r) . " " . ($cx - $r) . " " . ($cy - $rk) . " " . ($cx - $r) . " {$cy} c "
        . ($cx - $r) . " " . ($cy + $rk) . " " . ($cx - $rk) . " " . ($cy + $r) . " {$cx} " . ($cy + $r) . " c f Q\n";
}

// ── Dimensiones A4 (puntos) ───────────────────────────────────────────────────
$W = 595.28;
$H = 841.89;

// Paleta
$rose     = [0.58,  0.275, 0.337];
$dark     = [0.102, 0.110, 0.110];
$mid      = [0.325, 0.263, 0.271];
$pink     = [0.961, 0.847, 0.867];
$white    = [1.0,   1.0,   1.0];
$pinkMid  = [0.965, 0.851, 0.871];

// ── Stream de contenido ───────────────────────────────────────────────────────
$cs = '';

// Fondo crema
$cs .= rect(0, 0, $W, $H, [0.993, 0.947, 0.955]);

// Banda top/bottom
$cs .= rect(0, $H - 7, $W, 7,   $rose);
$cs .= rect(0, 0,      $W, 7,   $rose);

// Círculos decorativos
$cs .= circle(530, 725, 115, $pinkMid);
$cs .= circle(65,  95,  65,  $rose);
$cs .= circle(280, 420, 8,   $rose);   // pequeño acento central

// ── TEXTOS ────────────────────────────────────────────────────────────────────

// Etiqueta superior
$cs .= txt('FB', 7, 145, 822, 'ORDINARYBLOOM  //  SELF-CARE SOUNDSCAPE  //  2026', $rose);

// Título principal
$cs .= txt('FI', 58, 40,  738, 'Twilight', $dark);
$cs .= txt('FI', 58, 40,  672, 'Echoes.',  $rose);

// Subtítulo
$cs .= txt('FB', 11, 40, 645, 'A Curated Soundscape for Your Nightly Ritual', $mid);

// Línea divisora alta
$cs .= hLine(628, 40, $W - 40, $rose);

// Cita
$cs .= txt('FI', 10, 40, 611, '"True restoration begins not when we close our eyes,',          $mid);
$cs .= txt('FI', 10, 40, 597, ' but when we open our intention to the evening."', $mid);

// ── Las 5 Fases ───────────────────────────────────────────────────────────────
$cs .= txt('FB', 8, 40, 572, 'THE FIVE PHASES OF YOUR NIGHTLY RITUAL', $rose);
$cs .= hLine(566, 40, $W - 40, $pinkMid, 0.3);

$phases = [
    ['01', 'UNWIND',    '17:00 - 19:00', 'Soft piano melodies and gentle rain. Let the day dissolve slowly.'],
    ['02', 'CLEANSE',   '19:00 - 20:30', 'Light botanical frequencies. Accompany your skincare ritual.'],
    ['03', 'NOURISH',   '20:30 - 21:30', 'Low-fi strings and warm breaths. Time for journaling and reflection.'],
    ['04', 'RELEASE',   '21:30 - 22:30', 'Delta waves and night forest sounds. Ease tension from body and mind.'],
    ['05', 'SURRENDER', '22:30 ------>',  'Deep drone meditation. Let sleep arrive as a natural threshold.'],
];

$ry = 548;
foreach ($phases as $p) {
    $cs .= txt('FB', 9,  40,  $ry,       $p[0], $rose);
    $cs .= txt('FB', 10, 68,  $ry,       $p[1], $dark);
    $cs .= txt('FR', 8,  220, $ry,       $p[2], $rose);
    $cs .= txt('FR', 8,  68,  $ry - 14,  $p[3], $mid);
    $cs .= hLine($ry - 22, 40, $W - 40, $pinkMid, 0.2);
    $ry -= 46;
}

// ── Botánicos ─────────────────────────────────────────────────────────────────
$cs .= txt('FB', 8, 40, 335, 'RECOMMENDED BOTANICALS & AROMAS', $rose);
$cs .= hLine(329, 40, $W - 40, $pinkMid, 0.3);

$bots = [
    [40,  310, 'Lavender & Chamomile    — calming, floral'],
    [310, 310, 'Sandalwood & Cedarwood — grounding, woody'],
    [40,  292, 'Rose & Ylang Ylang      — romantic, heart-opening'],
    [310, 292, 'Vetiver & Patchouli     — earthy, deeply relaxing'],
];
foreach ($bots as $b) {
    $cs .= txt('FR', 8, $b[0], $b[1], '•  ' . $b[2], $mid);
}

// ── Intenciones ───────────────────────────────────────────────────────────────
$cs .= txt('FB', 8, 40, 266, 'NIGHTLY INTENTIONS', $rose);
$cs .= hLine(260, 40, $W - 40, $pinkMid, 0.3);

$intentions = [
    252, 236, 220, 204,
];
$texts = [
    '"I release what no longer serves me."',
    '"My body deserves rest and deep restoration."',
    '"I am grateful for one small beauty I noticed today."',
    '"Tomorrow I bloom a little further."',
];
foreach ($intentions as $i => $iy) {
    $cs .= txt('FI', 9, 40, $iy, $texts[$i], $mid);
}

// Línea divisora baja
$cs .= hLine(188, 40, $W - 40, $rose);

// Footer
$cs .= txt('FR', 8, 40, 175, 'Use with candles, warm lighting, and your favourite botanical oil.', $mid);
$cs .= txt('FB', 7, 165, 16,  'OrdinaryBloom  //  Twilight Echoes Soundscape Guide  //  ordinarybloom.com', $white);

// ── Construcción del PDF ──────────────────────────────────────────────────────

$streamLen = strlen($cs);

$obj1 = "<</Type /Catalog /Pages 2 0 R>>";
$obj2 = "<</Type /Pages /Kids [3 0 R] /Count 1>>";
$obj3 = "<</Type /Page /Parent 2 0 R /MediaBox [0 0 {$W} {$H}] /Contents 4 0 R\n"
      . "/Resources <</Font <</FR <</Type /Font /Subtype /Type1 /BaseFont /Helvetica>>"
      . " /FB <</Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold>>"
      . " /FI <</Type /Font /Subtype /Type1 /BaseFont /Helvetica-BoldOblique>>">>\n>>\n>>";
$obj4 = "<</Length {$streamLen}>>\nstream\n{$cs}\nendstream";

$pdf  = "%PDF-1.4\n%\xe2\xe3\xcf\xd3\n";

$off = [];
$off[1] = strlen($pdf);  $pdf .= "1 0 obj\n{$obj1}\nendobj\n";
$off[2] = strlen($pdf);  $pdf .= "2 0 obj\n{$obj2}\nendobj\n";
$off[3] = strlen($pdf);  $pdf .= "3 0 obj\n{$obj3}\nendobj\n";
$off[4] = strlen($pdf);  $pdf .= "4 0 obj\n{$obj4}\nendobj\n";

$xref = strlen($pdf);
$pdf .= "xref\n0 5\n";
$pdf .= sprintf("%010d 65535 f \n", 0);
foreach ([1,2,3,4] as $n) $pdf .= sprintf("%010d 00000 n \n", $off[$n]);

$pdf .= "trailer\n<</Size 5 /Root 1 0 R>>\nstartxref\n{$xref}\n%%EOF\n";

// ── Headers de descarga (compatibles con todos los navegadores) ───────────────
$len = strlen($pdf);
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Twilight-Echoes-OrdinaryBloom.pdf"');
header('Content-Length: ' . $len);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
header('Cache-Control: private, no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

echo $pdf;
exit;
?>
