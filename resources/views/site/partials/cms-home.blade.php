<script>
  document.addEventListener("DOMContentLoaded", function () {
    const cmsPage = @json($page ?? []);
    const cmsSections = @json($sections ?? []);

    const assetUrl = (path) => {
      if (!path) return "";
      if (path.startsWith("http://") || path.startsWith("https://") || path.startsWith("/storage/")) {
        return path;
      }
      return `{{ rtrim(asset(''), '/') }}/${path.replace(/^\//, '')}`;
    };

    const heroBadge = document.querySelector(".hero-badge");
    const heroTitle = document.querySelector(".hero-title");
    const heroDescription = document.querySelector(".hero-description");
    const primaryButton = document.querySelector(".hero-buttons .btn-primary-custom");
    const secondaryButton = document.querySelector(".hero-buttons .btn-outline-custom");
    const heroVideo = document.querySelector(".hero-bg-video source");
    const heroStats = document.querySelector(".hero-stats");

    if (heroBadge && cmsPage.hero_badge) heroBadge.textContent = cmsPage.hero_badge;
    if (heroTitle && cmsPage.hero_title) heroTitle.innerHTML = cmsPage.hero_title;
    if (heroDescription && cmsPage.hero_description) heroDescription.textContent = cmsPage.hero_description;
    if (primaryButton && cmsPage.primary_button_text) {
      primaryButton.textContent = cmsPage.primary_button_text;
      primaryButton.href = cmsPage.primary_button_link || primaryButton.href;
    }
    if (secondaryButton && cmsPage.secondary_button_text) {
      secondaryButton.textContent = cmsPage.secondary_button_text;
      secondaryButton.href = cmsPage.secondary_button_link || secondaryButton.href;
    }
    if (heroVideo && cmsPage.hero_media_path) {
      heroVideo.src = assetUrl(cmsPage.hero_media_path);
      heroVideo.parentElement.load();
    }
    if (heroStats && Array.isArray(cmsPage.content?.hero_stats) && cmsPage.content.hero_stats.length) {
      heroStats.innerHTML = cmsPage.content.hero_stats.map((stat) => `
        <div class="col-6 col-md-3">
          <div class="stat-item text-center">
            <h3>${stat.value || ''}</h3>
            <p>${stat.label || ''}</p>
          </div>
        </div>
      `).join("");
    }

    const about = cmsSections.about_preview || {};
    const aboutImage = document.querySelector(".about-image");
    const aboutExperienceTitle = document.querySelector(".about-experience h4");
    const aboutExperienceLabel = document.querySelector(".about-experience p");
    const aboutContent = document.querySelector(".about-content");
    if (aboutImage && about.image_path) aboutImage.src = assetUrl(about.image_path);
    if (aboutExperienceTitle && about.content?.experience_years) aboutExperienceTitle.textContent = about.content.experience_years;
    if (aboutExperienceLabel && about.content?.experience_label) aboutExperienceLabel.textContent = about.content.experience_label;
    if (aboutContent) {
      const label = aboutContent.querySelector(".section-label");
      const heading = aboutContent.querySelector("h3");
      const paragraphs = aboutContent.querySelectorAll("p");
      const button = aboutContent.querySelector("a.btn");
      if (label && about.title) label.textContent = about.title;
      if (heading && about.subtitle) heading.textContent = about.subtitle;
      (about.content?.paragraphs || []).forEach((paragraph, index) => {
        if (paragraphs[index]) paragraphs[index].textContent = paragraph;
      });
      if (button && about.button_text) {
        button.textContent = about.button_text;
        button.href = about.button_link || button.href;
      }
    }

    const strategic = cmsSections.strategic_advisory || {};
    const strategicKicker = document.querySelector(".strategic-kicker");
    const strategicTitle = document.querySelector(".strategic-title");
    const strategicParagraphs = document.querySelectorAll(".strategic-copy p");
    if (strategicKicker && strategic.title) strategicKicker.textContent = strategic.title;
    if (strategicTitle && strategic.subtitle) {
      const parts = strategic.subtitle.trim().split(/\s+/);
      if (parts.length > 1) {
        const emphasis = parts.pop();
        strategicTitle.innerHTML = `${parts.join(" ")} <strong>${emphasis}</strong>`;
      } else {
        strategicTitle.textContent = strategic.subtitle;
      }
    }
    (strategic.content?.cards || []).forEach((card, index) => {
      if (strategicParagraphs[index]) strategicParagraphs[index].textContent = card.body || "";
    });

    const services = cmsSections.services_preview || {};
    const servicesHeader = document.querySelector(".services-preview-section .section-header");
    if (servicesHeader) {
      const label = servicesHeader.querySelector(".section-label");
      const heading = servicesHeader.querySelector(".section-title");
      const desc = servicesHeader.querySelector(".section-description");
      if (label && services.title) label.textContent = services.title;
      if (heading && services.subtitle) heading.textContent = services.subtitle;
      if (desc && services.body) desc.textContent = services.body;
    }
    const serviceCards = document.querySelectorAll(".services-preview-section .service-card");
    (services.content?.items || []).forEach((item, index) => {
      const card = serviceCards[index];
      if (!card) return;
      const title = card.querySelector("h4");
      const body = card.querySelector("p");
      const link = card.querySelector("a");
      if (title) title.textContent = item.title || "";
      if (body) body.textContent = item.body || "";
      if (link) link.href = services.button_link || link.href;
    });
    const servicesButton = document.querySelector(".services-preview-section .btn.btn-navy");
    if (servicesButton && services.button_text) {
      servicesButton.textContent = services.button_text;
      servicesButton.href = services.button_link || servicesButton.href;
    }

    const clientele = cmsSections.clientele || {};
    const clienteleHeader = document.querySelector(".clientele-section .section-header");
    if (clienteleHeader) {
      const label = clienteleHeader.querySelector(".section-label");
      const heading = clienteleHeader.querySelector(".section-title");
      const desc = clienteleHeader.querySelector(".section-description");
      if (label && clientele.title) label.textContent = clientele.title;
      if (heading && clientele.subtitle) heading.textContent = clientele.subtitle;
      if (desc && clientele.body) desc.textContent = clientele.body;
    }
    const clienteleTrack = document.querySelector(".clientele-track");
    if (clienteleTrack && Array.isArray(clientele.content?.logos) && clientele.content.logos.length) {
      const logos = clientele.content.logos.concat(clientele.content.logos);
      clienteleTrack.innerHTML = logos.map((logo, index) => `
        <div class="client-logo-card" ${index >= clientele.content.logos.length ? 'aria-hidden="true"' : ''}>
          <img src="${assetUrl(logo.image_path)}" alt="${index >= clientele.content.logos.length ? '' : (logo.alt || '')}" loading="lazy" />
        </div>
      `).join("");
    }

    const whyChoose = cmsSections.why_choose || {};
    const whyHeader = document.querySelector(".why-choose-section .section-header");
    if (whyHeader) {
      const label = whyHeader.querySelector(".section-label");
      const heading = whyHeader.querySelector(".section-title");
      const desc = whyHeader.querySelector(".section-description");
      if (label && whyChoose.title) label.textContent = whyChoose.title;
      if (heading && whyChoose.subtitle) heading.textContent = whyChoose.subtitle;
      if (desc && whyChoose.body) desc.textContent = whyChoose.body;
    }
    const featureBoxes = document.querySelectorAll(".why-choose-section .feature-box");
    (whyChoose.content?.items || []).forEach((item, index) => {
      const box = featureBoxes[index];
      if (!box) return;
      const title = box.querySelector("h4");
      const body = box.querySelector("p");
      if (title) title.textContent = item.title || "";
      if (body) body.textContent = item.body || "";
    });

    const cta = cmsSections.contact_cta || {};
    const ctaContent = document.querySelector(".cta-content");
    if (ctaContent) {
      const heading = ctaContent.querySelector("h2");
      const body = ctaContent.querySelector("p");
      const button = ctaContent.querySelector("a");
      if (heading && cta.title) heading.textContent = cta.title;
      if (body && cta.body) body.textContent = cta.body;
      if (button && cta.button_text) {
        button.textContent = cta.button_text;
        button.href = cta.button_link || button.href;
      }
    }

    window.heroSlides = cmsPage.content?.hero_slides || window.heroSlides || [];
  });
</script>
