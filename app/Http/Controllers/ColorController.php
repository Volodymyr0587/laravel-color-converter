<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function hexToRgb(Request $request)
    {
        $hex = ltrim($request->input('hex'), '#');

        if (strlen($hex) === 3) {
            $hex = implode('', array_map(fn($char) => $char . $char, str_split($hex)));
        }

        if (strlen($hex) !== 6) {
            return redirect()->back()->with('error', 'Invalid HEX color');
        }

        $rgb = [
            'r' => hexdec(substr($hex, 0, 2)),
            'g' => hexdec(substr($hex, 2, 2)),
            'b' => hexdec(substr($hex, 4, 2)),
        ];

        return redirect()->route('color-converter')->with('result', [
            'type' => 'rgb',
            'value' => "rgb({$rgb['r']}, {$rgb['g']}, {$rgb['b']})",
            'color' => "rgb({$rgb['r']}, {$rgb['g']}, {$rgb['b']})",
        ]);
    }

    public function rgbToHex(Request $request)
    {
        $validated = $request->validate([
            'r' => ['required', 'integer', 'min:0', 'max:255'],
            'g' => ['required', 'integer', 'min:0', 'max:255'],
            'b' => ['required', 'integer', 'min:0', 'max:255'],
        ], [
            'r.required' => 'Red color field is required',
            'g.required' => 'Green color field is required',
            'b.required' => 'Blue color field is required',
        ]);

        $hex = sprintf("#%02x%02x%02x", $validated['r'], $validated['g'], $validated['b']);

        return redirect()->route('color-converter')->with('result', [
            'type' => 'hex',
            'value' => $hex,
            'color' => $hex,
        ]);
    }
}
