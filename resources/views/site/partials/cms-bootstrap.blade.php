<script>
  document.addEventListener("DOMContentLoaded", function () {
    const cmsPage = @json($page ?? []);
    const cmsSettings = @json($settings ?? []);
    const cmsSections = @json($sections ?? []);

    const siteName = cmsSettings.site_name || "Brevity Anderson";
    const fallbackLogoPath = "{{ asset('BREVITY_logo.png') }}";
    const logoPath = cmsSettings.logo_path || fallbackLogoPath;
    const socialLinks = cmsSettings.social_links || {};

    document.querySelectorAll(".navbar-brand img, .footer-logo img").forEach((img) => {
      img.addEventListener("error", function handleLogoError() {
        if (img.src !== fallbackLogoPath) {
          img.src = fallbackLogoPath;
        }
      }, { once: true });

      img.src = logoPath;
      img.alt = `${siteName} Logo`;
    });

    document.querySelectorAll(".navbar-brand-text, .footer-logo-text").forEach((el) => {
      el.innerHTML = siteName.replace(" ", "<span>") + (siteName.includes(" ") ? "</span>" : "");
    });

    const pageHeaderTitle = document.querySelector(".page-header-title");
    if (pageHeaderTitle && cmsPage.name) {
      pageHeaderTitle.textContent = cmsPage.name;
    }

    const breadcrumbCurrent = document.querySelector(".breadcrumb-item.active");
    if (breadcrumbCurrent && cmsPage.name) {
      breadcrumbCurrent.textContent = cmsPage.name;
    }

    const footerIntro = document.querySelector(".footer-widget p");
    if (footerIntro && cmsSettings.footer_text) {
      footerIntro.textContent = cmsSettings.footer_text;
    }

    const footerSection = cmsSections.footer || {};
    const quickLinks = footerSection.content?.quick_links || [];
    const serviceLinks = footerSection.content?.service_links || [];
    const footerLinkGroups = document.querySelectorAll(".footer-links");

    if (footerLinkGroups[0] && quickLinks.length) {
      footerLinkGroups[0].innerHTML = quickLinks.map((link) => `
        <li><a href="${link.link || '#'}"><i class="bi bi-chevron-right"></i> ${link.label || ''}</a></li>
      `).join("");
    }

    if (footerLinkGroups[1] && serviceLinks.length) {
      footerLinkGroups[1].innerHTML = serviceLinks.map((link) => `
        <li><a href="${link.link || '#'}"><i class="bi bi-chevron-right"></i> ${link.label || ''}</a></li>
      `).join("");
    }

    const footerContactItems = document.querySelectorAll(".footer-contact li span");
    if (footerContactItems[0] && cmsSettings.address) footerContactItems[0].innerHTML = cmsSettings.address.replace(/\n/g, "<br>");
    if (footerContactItems[1] && cmsSettings.phone) footerContactItems[1].textContent = cmsSettings.phone;
    if (footerContactItems[2] && cmsSettings.email) footerContactItems[2].textContent = cmsSettings.email;

    document.querySelectorAll(".footer-social a, .contact-social .social-links a").forEach((link) => {
      const label = (link.getAttribute("aria-label") || "").toLowerCase();
      if (socialLinks[label]) {
        link.href = socialLinks[label];
      }
    });

    if (document.body.contains(document.getElementById("contactForm"))) {
      const contactInfoItems = document.querySelectorAll(".contact-info-content");
      if (contactInfoItems[0] && cmsSettings.address) {
        const addressParagraph = contactInfoItems[0].querySelector("p");
        if (addressParagraph) addressParagraph.innerHTML = cmsSettings.address.replace(/\n/g, "<br>");
      }
      if (contactInfoItems[1] && cmsSettings.phone) {
        contactInfoItems[1].innerHTML = `<h5>Phone</h5><a href="tel:${cmsSettings.phone.replace(/\s+/g, "")}">${cmsSettings.phone}</a>`;
      }
      if (contactInfoItems[2] && cmsSettings.email) {
        contactInfoItems[2].innerHTML = `<h5>Email</h5><a href="mailto:${cmsSettings.email}">${cmsSettings.email}</a>`;
      }
    }
  });
</script>
