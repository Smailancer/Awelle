# Awale & Siwel: Strategic Overview and Enhancement Roadmap

## 1. Project Overview (Functional & Business Perspective)

**Awale** (accessible at [Awale.net](https://awale.net)) is a foundational data collection initiative designed to preserve and revitalize the North African linguistic heritage. It currently functions as a collaborative digital dictionary and is transitioning into the data core for a future AI ecosystem.

### 🎯 Mission & Business Goal
The primary objective is to build a massive, high-quality linguistic dataset that will serve as the engine for **Siwel**, a local Large Language Model (LLM). **Siwel** will be designed to understand and interact with individuals speaking any North African slang or variant, bridging the gap between traditional languages and modern AI.

### 🏗️ Data Architecture & Hierarchy
The database is being structured to handle the complex linguistic landscape of North Africa through a multi-layered hierarchy:

1.  **Linguistic Pillars**:
    *   **Darja**: North African Arabic variants.
    *   **Tamazight**: Amazigh/Berber variants.
2.  **Geographic Layer (Country)**:
    *   Mapping linguistic data to specific countries (Algeria, Morocco, Tunisia, Libya, Mauritania).
3.  **Variant/Slang Layer**:
    *   Specific dialects (e.g., Kabyle, Chaoui, Chleuh, Zenati).
    *   **Cross-Border Differentiation**: The architecture explicitly recognizes that the same slang name (e.g., **Chleuh**) may exist in different countries (Algeria and Morocco) but contains distinct vocabulary, pronunciation, and usage.

### 👥 Target Audience
*   **Native Speakers**: Contributing and validating their local vernacular.
*   **Language Learners & Diaspora**: Reconnecting with their roots.
*   **Developers/Researchers**: Utilizing the dataset for the Siwel LLM and other linguistic AI applications.

---

## 2. Strategic Enhancement Suggestions

To address current pain points (lack of contributors, accuracy verification, low visibility) and move towards the Siwel LLM vision, the following enhancements are suggested:

### A. Refined Data Architecture & LLM Readiness
*   **Three-Tier Slang Management**: Refactor the database to support the `Pillar -> Country -> Slang` relationship. This ensures that "Chleuh (Algeria)" and "Chleuh (Morocco)" can be treated as related but distinct datasets.
*   **Rich Training Data for Siwel**: Expand the `words` schema to include:
    *   **Contextual Sentences**: Multiple examples of the word in daily conversation.
    *   **Audio Snippets**: User-contributed recordings for future Speech-to-Text (STT) capabilities.
    *   **Dialectal Synonyms**: Explicitly linking similar words across different countries and variants.

### B. Automation for Quality & Volume
*   **AI-Assisted Entry**: Integrate a temporary external LLM (like GPT-4) to suggest meanings, Tifinagh transliterations, and example sentences as a user types, which they can then verify.
*   **Automated Validation Rules**: Implement scripts to check for missing required scripts (Arabic/Latin/Tifinagh) and detect potential duplicates or conflicts across different countries.
*   **Bulk Ingestion**: Partner with linguistic researchers to import existing glossaries into the Awale database.

### C. Community Engagement & Visibility (Gamification)
*   **Contributor Levels & Badges**: Implement a system where users earn points and "Linguistic Guardian" titles for contributions and successful verifications.
*   **Verified Contributors**: Highlight words verified by recognized community experts or high-ranking contributors to increase trust.
*   **SEO & Social Integration**: Auto-generate "Word of the Day" social media cards for various countries to increase platform visibility.

### D. Mobile & Offline Reach
*   **Offline-First PWA**: Optimize Awale.net to work offline, allowing users in remote areas to search and draft word entries without a stable internet connection.
*   **Siwel Mobile App**: Develop a cross-platform mobile app focused on ease of contribution (e.g., voice recording for words).

### E. Transition to Siwel LLM
*   **Data Export API**: Build a specialized API for exporting cleaned, structured data specifically formatted for LLM fine-tuning (JSONL format).
*   **Feedback Loop**: As Siwel Alpha is developed, integrate it into the dictionary as a "Smart Assistant" that learns from user corrections in real-time.

---

## 3. Implementation Priorities

1.  **Short-Term**: Refactor Slang hierarchy (Pillar/Country/Slang) and implement AI-assisted contribution tools to solve the "empty database" and "verification" pain points.
2.  **Mid-Term**: Launch gamification features and the offline-first PWA to boost engagement and reach.
3.  **Long-Term**: Build the Siwel data export pipeline and initiate the first round of LLM fine-tuning.
