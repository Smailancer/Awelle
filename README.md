# Awelle (أَوَال) - North African Variants Digital Dictionary

<div align="center">
  <img src="public/images/logo.png" alt="Awelle Logo" width="200"/>
  
  [![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
  [![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
  [![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
</div>

## 📖 About Awelle

**Awelle** (أَوَال - meaning "word" or "speech" in Tamazight) is a collaborative digital dictionary platform dedicated to documenting, preserving, and developing North African Tamazight (Amazigh/Berber) language variants and dialects. This project serves as the first comprehensive digital resource for North African linguistic heritage.

### 🎯 Mission

To document and develop the vocabulary elements of North African tangible and intangible heritage, including:
- Regional dialects and language variants
- Traditional vocabulary (nature, food, clothing, tools)
- Cultural expressions and daily life terminology
- Modern terminology development for contemporary usage

### 🌍 Target Audience

- **Native Speakers**: Tamazight dialect speakers across North Africa
- **Language Learners**: Individuals studying North African languages
- **Diaspora Communities**: North Africans abroad preserving their ancestral language
- **Researchers & Linguists**: Academics studying North African languages
- **Cultural Preservationists**: Those documenting cultural heritage

## ✨ Key Features

### 🔤 Multi-Script Support
- **Arabic Script**: With diacritics and special characters (ڥ, پ, چ, ڨ)
- **Latin Transliteration**: Standardized spelling with special characters (č, ḍ, ǧ, ḥ, ɣ, ṛ, ṣ, ṭ, ẓ, ɛ)
- **Tifinagh Script**: Native Amazigh alphabet (ⵜⴰⵎⴰⵣⵉⵖⵜ)

### 🗣️ Dialect Coverage
Support for 8 major North African language variants:
- **Kabyle** (القبائلية) - Algeria
- **Chaoui** (الشاوية) - Algeria
- **Mozabit** (المزابية) - Algeria
- **Chenoui** (الشنوية) - Algeria
- **Chleuh** (الشلحية) - Morocco
- **Targui** (الطارقية) - Tuareg
- **Zenati** (الزناتية) - Algeria
- **Darja** (الدارجة) - North African Arabic

### 🌐 Multilingual Interface
Complete platform translation in 4 languages:
- Arabic (العربية)
- French (Français)
- English
- Tamazight (ⵜⴰⵎⴰⵣⵉⵖⵜ)

### 📝 Word Management
- **Comprehensive Entries**: Term, pronunciation, Tifinagh, meanings (AR/FR/EN)
- **19 Word Categories**: Nouns, verbs, adjectives, colors, family terms, food, body parts, nature, tools, emotions, and more
- **Usage Examples**: Context and example sentences
- **Geographic Tagging**: Link words to specific Algerian provinces (wilayas)

### 👥 Community Features
- **User Contributions**: Authenticated users can add and edit words
- **Comment System**: Discussion and clarification on word entries
- **Correction Suggestions**: Community-driven quality improvement
- **Admin Moderation**: Review and approval workflow for corrections
- **Role-Based Access**: User, Editor, and Admin roles

### 🔍 Advanced Search
- **Fuzzy Search**: Arabic text normalization (removes diacritics, normalizes alef variants)
- **Multi-Field Search**: Searches across term, meanings, Tifinagh, pronunciation, and usage
- **Smart Filtering**: By dialect, word type, and contributor
- **Word Cloud**: Visual representation of vocabulary

### 🚀 Future Vision

#### Lang Lab (مختبر الكلمات)
Community workspace for developing new terminology to suit modern times

#### Proverbs Court (محكمة الأمثال)
Platform for documenting and validating ancient popular proverbs

#### Siwelle Academy (أكاديمية سِيوَل)
Educational platform teaching diaspora youth their ancestral language

## 🛠️ Technology Stack

- **Backend**: Laravel 10 (PHP 8.1+)
- **Frontend**: Blade Templates, TailwindCSS, Alpine.js
- **UI Components**: Flowbite
- **Authentication**: Laravel Breeze
- **Database**: MySQL/MariaDB
- **Asset Bundling**: Vite
- **Security**: Google reCAPTCHA
- **Deployment**: Docker support

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- MySQL >= 5.7 or MariaDB >= 10.3
- NPM or Yarn

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/Smailancer/Awelle.git
cd Awelle
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node Dependencies
```bash
npm install
```

### 4. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=awelle
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Migrations
```bash
php artisan migrate
```

### 7. Seed Database (Optional)
```bash
php artisan db:seed
```

### 8. Build Assets
```bash
npm run build
# or for development
npm run dev
```

### 9. Start Development Server
```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000)

## 🐳 Docker Deployment

```bash
# Build and start containers
docker-compose up -d

# Run migrations
docker-compose exec app php artisan migrate

# Access the application
# http://localhost:8000
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --filter=CommentAuthorizationTest

# Run with coverage
php artisan test --coverage
```

## 📊 Database Schema

### Core Tables
- **users**: User accounts with roles (user, editor, admin)
- **words**: Main dictionary entries with multilingual content
- **slangs**: Dialect/variant definitions
- **wilayas**: Algerian provinces for geographic tagging
- **comments**: User discussions on word entries
- **correction_suggestions**: Community improvement proposals
- **slang_word**: Many-to-many relationship between words and dialects

### Key Relationships
```
User (1) ──→ (Many) Words
User (1) ──→ (Many) Comments
User (1) ──→ (Many) CorrectionSuggestions
Word (Many) ←→ (Many) Slangs
Word (Many) ←→ (Many) Wilayas
Word (1) ──→ (Many) Comments
Word (1) ──→ (Many) CorrectionSuggestions
```

## 🔐 User Roles & Permissions

### User
- Create new words
- Edit own words
- Delete own words
- Add comments
- Delete own comments
- Suggest corrections

### Editor
- All User permissions
- Review content quality

### Admin
- All Editor permissions
- Approve/reject correction suggestions
- Delete any word or comment
- Manage users
- Access admin panel

## 🌟 Contributing

We welcome contributions from the community! Here's how you can help:

1. **Fork the repository**
2. **Create a feature branch** (`git checkout -b feature/AmazingFeature`)
3. **Commit your changes** (`git commit -m 'Add some AmazingFeature'`)
4. **Push to the branch** (`git push origin feature/AmazingFeature`)
5. **Open a Pull Request**

### Contribution Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Ensure all tests pass before submitting PR

## 🐛 Bug Reports

If you discover a bug, please create an issue with:
- Clear description of the problem
- Steps to reproduce
- Expected vs actual behavior
- Screenshots (if applicable)
- Environment details (PHP version, OS, etc.)

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🙏 Acknowledgments

- Laravel Framework
- Flowbite UI Components
- TailwindCSS
- The North African linguistic community
- All contributors and supporters

## 📧 Contact

For questions, suggestions, or collaboration opportunities:
- **Website**: [awale.net](https://awale.net)
- **GitHub**: [github.com/Smailancer/Awelle](https://github.com/Smailancer/Awelle)

## 🌟 Support the Project

If you find this project valuable, please consider:
- ⭐ Starring the repository
- 🐛 Reporting bugs
- 💡 Suggesting new features
- 🤝 Contributing code or translations
- 📢 Spreading the word about Awelle

---

<div align="center">
  <strong>Preserving North African linguistic heritage, one word at a time.</strong>
  <br>
  Made with ❤️ for the Amazigh community
</div>
