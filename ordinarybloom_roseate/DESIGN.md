# Design System Strategy: The Botanical Editorial

## 1. Overview & Creative North Star
The Creative North Star for this design system is **"The Digital Florist’s Atelier."** 

This is not a standard, rigid grid-based interface. It is an editorial experience that mimics the tactile quality of a high-end botanical magazine. We move beyond "clean" into the realm of "intentional." By leveraging the tension between the classic, high-contrast serif of *Playfair Display* and the geometric clarity of *Montserrat*, we create a space that feels both heritage-inspired and modern. 

To break the "template" look, designers must embrace **intentional asymmetry**. Hero sections should not be perfectly centered; instead, use overlapping elements where images bleed off the edge or "float" over text blocks. This system celebrates the "Ordinary" by making it "Extraordinary" through generous white space and a rejection of traditional structural boundaries.

---

## 2. Colors & Tonal Depth
The palette is a sophisticated graduation of rosy tones and neutrals. It is designed to feel "lit from within" rather than painted on.

### The "No-Line" Rule
**Explicit Instruction:** Traditional 1px solid borders are strictly prohibited for sectioning or card definition. Boundaries must be established through:
*   **Background Shifts:** Transitioning from `surface` (#F9F9F9) to `surface-container-low` (#F3F3F3).
*   **Tonal Nesting:** A `surface-container-lowest` (#FFFFFF) card sitting on a `primary-fixed` (#FFD9DE) background.

### Surface Hierarchy & Nesting
Treat the UI as physical layers of fine vellum paper. 
*   **Level 0 (Base):** `surface` (#F9F9F9) for the overall canvas.
*   **Level 1 (Sections):** `surface-container-low` (#F3F3F3) for secondary content blocks.
*   **Level 2 (Interaction):** `surface-container-lowest` (#FFFFFF) for primary cards and input fields.

### The "Glass & Gradient" Rule
To add "soul," use subtle radial gradients for hero backgrounds, transitioning from `primary-fixed` (#FFD9DE) to `surface`. For floating navigation or modals, utilize **Glassmorphism**: 
*   **Background:** `surface-container-lowest` at 70% opacity.
*   **Blur:** 16px to 24px backdrop-blur.
*   **Edge:** A 1px "Ghost Border" using `outline-variant` (#D8C1C3) at 15% opacity.

---

## 3. Typography: The Editorial Voice
Our typography scale is the primary driver of the brand's premium feel.

*   **Display & Headlines (Playfair Display):** Used for "Moments of Inspiration." These should be set with tight letter-spacing and generous line-height to feel like a printed masthead.
*   **Body & Controls (Montserrat):** Used for "Moments of Utility." Montserrat provides a functional, modern counter-balance to the serif. Keep body text in `on-surface-variant` (#534345) to maintain softness; never use pure black for long-form reading.

**Hierarchy Intent:** 
*   `display-lg` is for emotional impact.
*   `title-md` and `label-md` are for navigation and action, set in uppercase with slightly increased tracking (+5%) to signify authority.

---

## 4. Elevation & Depth
In this design system, depth is a whisper, not a shout. 

*   **Tonal Layering:** Avoid shadows where possible. Achieve hierarchy by placing lighter elements on darker surfaces (e.g., a White card on a Soft Pink background).
*   **Ambient Shadows:** When a card requires a "lift" (e.g., on hover), use a shadow tinted with `primary` (#934656). 
    *   *Shadow Recipe:* `0px 12px 32px -4px rgba(147, 70, 86, 0.08)`.
*   **Roundedness:** Adhere to the **xl (1.5rem / 24px)** scale for large containers and **md (0.75rem / 12px)** for buttons. This high radius mimics organic, petal-like shapes.

---

## 5. Component Guidelines

### Buttons: The Soft Touch
*   **Primary:** Background `primary` (#934656), text `on-primary` (#FFFFFF). 20px (xl) corner radius.
*   **Secondary:** Background `primary-container` (#F294A5), text `on-primary-container` (#702B3B).
*   **Tertiary:** No background. Text `primary`. Use for low-priority actions.

### Cards & Lists: The No-Divider Rule
*   **Cards:** Use `surface-container-lowest` (#FFFFFF) with an **xl** radius. Never use a border.
*   **Lists:** Forbid the use of horizontal divider lines. Separate list items using 16px of vertical white space or a very subtle background hover state change to `surface-container-high` (#E8E8E8).

### Input Fields
*   **Style:** Minimalist. Use `surface-container-lowest` as the fill. 
*   **Focus State:** Instead of a heavy border, use a 2px "Ghost Border" of `primary` (#934656) at 30% opacity and a soft inner glow.

### Signature Component: "The Floating Bloom"
*   A specialized CTA or notification card using Glassmorphism (70% white, backdrop blur) with an icon wrapped in a circular `secondary-container` (#FE8CA0) shape. Use this for "Inspiring" moments.

---

## 6. Do's and Don'ts

### Do
*   **DO** use asymmetric margins. For example, give a headline 20% more padding on the left than the right to create an editorial flow.
*   **DO** use "Negative Space" as a functional element. If a section feels crowded, double the padding.
*   **DO** use images with soft, natural lighting that complement the `#FDE8EE` pink tones.

### Don't
*   **DON'T** use 100% black (#000000) for anything. Use `on-surface` (#1A1C1C) or `on-surface-variant` (#534345).
*   **DON'T** use sharp 90-degree corners. Everything in this system should feel touchable and soft.
*   **DON'T** use heavy drop shadows. If you can see the shadow clearly, it is too dark. It should feel like an ambient glow.
*   **DON'T** use standard "Bootstrap-style" grids. Allow elements to overlap or stagger vertically to create a curated, non-linear path for the eye.