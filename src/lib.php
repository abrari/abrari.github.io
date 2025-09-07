<?php

function get_inventory_list($kategori) {
    $json = 'data/inventory.json';
    $file_content = file_get_contents($json);
    $data = json_decode($file_content);

    $by_kategori = array_filter($data, function($item) use ($kategori) {
        if (isset($item->Kategori) && $item->Kategori == $kategori) {
            return true;
        }
        return false;
    });

    return $by_kategori;
}

function get_inventory($kode) {
    $list = get_inventory_list();
    foreach($list as $el) {
        if ($el->Kode == $kode) {
            return $el;
        }
    }
    return false;
}

function get_product_kode_from_url($request_uri) {
    $slug_code = null;

    // The pattern looks for a slash, then any characters, then another slash.
    // Then it captures a sequence of characters that aren't a dash (the slug code).
    if (preg_match('/\/[^\/]+\/([^-]+)-/', $request_uri, $matches)) {
        $slug_code = $matches[1];
    }

    return $slug_code;
}

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function format_rp($num) {
    return "Rp " . number_format($num, 0, ",", ".");
}