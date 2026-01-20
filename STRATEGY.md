# Awelle & Siwel: Strategic Overview and Enhancement Roadmap

## 1. Project Overview (Functional & Business Perspective)

**Awelle** (currently transitioning to **Siwel**) is more than just a digital dictionary; it is a foundational data collection initiative designed to preserve and revitalize the North African linguistic heritage.

### 🎯 Mission & Business Goal
The primary objective is to build a massive, high-quality linguistic dataset that will serve as the core for **Siwel**, a local Large Language Model (LLM). This LLM will be capable of understanding and interacting in various North African variants and slangs, filling a significant gap in current AI technology which often overlooks these "low-resource" languages.

### 🏗️ Core Structure
The data architecture is evolving to center around two primary linguistic pillars:
1.  **Darja**: North African Arabic variants.
2.  **Tamazight**: Amazigh/Berber language variants.

Each pillar will branch out into its respective sub-dialects (e.g., Kabyle, Chaoui, Chleuh, etc.), allowing for a granular yet structured representation of the linguistic landscape.

### 👥 Target Audience
*   **Native Speakers**: Contributing and validating their local vernacular.
*   **Language Learners & Diaspora**: Reconnecting with their roots.
*   **Developers/Researchers**: Utilizing the dataset for linguistic AI applications.

---

## 2. Strategic Enhancement Suggestions

To address current pain points (lack of contributors, accuracy verification, low visibility) and move towards the Siwel LLM vision, the following enhancements are suggested:

### A. Data Architecture & LLM Readiness
*   **Hierarchical Slang Management**: Modify the `slangs` structure to support a "Category -> Sub-dialect" relationship (e.g., `Category: Tamazight` -> `Sub-dialect: Kabyle`).
*   **Rich Training Data**: Expand the `words` schema to include more fields essential for LLM training:
    *   **Contextual Sentences**: Multiple examples of the word in daily conversation.
    *   **Audio Snippets**: User-contributed recordings for future Speech-to-Text (STT) capabilities.
    *   **Dialectal Synonyms**: Explicitly linking similar words across different variants.

### B. Automation for Quality & Volume
*   **AI-Assisted Entry**: Integrate a temporary external LLM (like GPT-4) to suggest meanings, Tifinagh transliterations, and example sentences as a user types, which they can then verify.
*   **Automated Validation Rules**: Implement scripts to check for common spelling errors, missing required scripts (Arabic/Latin/Tifinagh), and duplicate entries across dialects.
*   **Bulk Ingestion**: Develop tools to import data from existing linguistic research and open-source glossaries to jumpstart the database volume.

### C. Community Engagement & Visibility (Gamification)
*   **Contributor Levels & Badges**: Implement a system where users earn points and "Linguistic Guardian" titles for contributions and successful verifications.
*   **Verified Contributors**: Highlight words verified by recognized community experts or high-ranking contributors to increase trust.
*   **SEO & Social Integration**: Auto-generate "Word of the Day" social media cards to increase platform visibility and attract new contributors.

### D. Mobile & Offline Reach
*   **Offline-First PWA**: Optimize the web application to work offline, allowing users in remote areas to search and draft word entries without a stable internet connection.
*   **Mobile App (Siwel App)**: Develop a cross-platform mobile app (Flutter or React Native) focused on ease of contribution (e.g., voice recording for words).

### E. Transition to Siwel LLM
*   **Data Export API**: Build a specialized API for exporting cleaned, structured data specifically formatted for LLM fine-tuning (JSONL format).
*   **Feedback Loop**: As Siwel Alpha is developed, integrate it into the dictionary as a "Smart Assistant" that learns from user corrections in real-time.

---

## 3. Implementation Priorities

1.  **Short-Term**: Refactor Slang hierarchy and implement AI-assisted contribution tools to solve the "empty database" and "verification" pain points.
2.  **Mid-Term**: Launch gamification features and the offline-first PWA to boost engagement and reach.
3.  **Long-Term**: Build the Siwel data export pipeline and initiate the first round of LLM fine-tuning.
