# Slim Inertia Template

This repository provides a starter template for integrating [SlimPHP](https://www.slimframework.com/), [Inertia.js](https://inertiajs.com/), [Vue.js](https://vuejs.org/), and [Twig](https://twig.symfony.com/) in a single web application. It uses Inertia to bridge server-rendered routes with a Vue frontend, with Twig as the templating engine for server-side rendering.

## Features

- **SlimPHP**: A fast, minimalist PHP framework for handling HTTP requests.
- **Inertia.js**: Simplifies SPA development by bridging server-rendered pages with Vue.js.
- **Vue 3**: A powerful JavaScript framework for building modern UIs.
- **Twig**: Server-side templating for initial HTML rendering.
- **Modular Structure**: Clear organization for controllers, views, routes, and the Inertia adapter.

## Prerequisites

- PHP >= 7.4
- Composer
- Node.js and npm (for frontend dependencies)
- A development server (e.g., PHP's built-in server)

## Installation

1. **Clone the repository**:

   ```bash
      git clone https://github.com/iakhator/slim-inertia-template.git
      cd slim-inertia-template 
   ```

2. **Install all dependencies**

    ```bash
    composer install && npm install
    ```

3. **Start the development server**

    ```bash
      make start
    ```
