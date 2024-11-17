<?php

function vite(string $asset): string
{
    // Set the development URL for Vite's dev server
    $devServerUrl = 'http://localhost:5173/' . $asset;

    // Check if Vite is in development mode
    if (isViteDevServerRunning()) {
    	if (strpos($asset, 'assets/') === 0) {
            // Serve assets from the Vite server at /assets
            return 'http://localhost:8080/assets/' . $asset;
        }
        // Return the dev server URL if it’s running
        return $devServerUrl;
    }

    // Production mode: use manifest.json
    $manifestPath = __DIR__ . '/public/dist/manifest.json';

    if (!file_exists($manifestPath)) {
        throw new Exception("Vite manifest file not found at {$manifestPath}");
    }

    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (!isset($manifest[$asset])) {
        throw new Exception("Asset {$asset} not found in Vite manifest.");
    }

    return '/dist/' . $manifest[$asset]['file'];
}

// Helper function to check if Vite's dev server is running
function isViteDevServerRunning(): bool
{
    $ch = curl_init('http://localhost:5173');
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1); // Quick timeout to avoid delay if server is down
    curl_exec($ch);
    $isUp = !curl_errno($ch);
    curl_close($ch);
    return $isUp;
}
