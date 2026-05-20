# Pacha Expeditions

WordPress theme for [Pacha Expeditions](https://pachaexpeditions.com/) — a Peru travel & tours company.

## Tech Stack

- **WordPress** custom theme (PHP)
- **Tailwind CSS v3** for styling
- **ACF** (Advanced Custom Fields) for flexible content

## Requirements

- PHP 7.2+
- WordPress 5.4+
- Node.js (for building CSS)

## Getting Started

### Install dependencies

```bash
npm install
```

### Development (watch mode)

```bash
npm run dev
```

### Production build

```bash
npm run build
```

## Theme Structure

```
pachaexp/
├── assets/          # Static assets (images, fonts)
├── img/             # Theme images
├── inc/             # PHP includes & functions
├── js/              # JavaScript files
├── src/             # Tailwind CSS source
│   └── input.css
├── template-parts/  # Reusable template partials
├── acf-json/        # ACF field group definitions
├── functions.php    # Theme setup & hooks
├── front-page.php   # Homepage template
├── single.php       # Single post template
├── single-blog.php  # Blog post template
└── style.css        # Theme metadata & base styles
```

## Author

**Roel Jhonatan** — [pachaexpeditions.com](https://pachaexpeditions.com/)

## License

GNU General Public License v2 or later. See [LICENSE](LICENSE) for details.
