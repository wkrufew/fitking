<?php

if (!function_exists('formatOrderNumber')) {
    function formatOrderNumber(string $id): string
    {
        return 'king' . str_pad($id, 9, '0', STR_PAD_LEFT);
    }
}