export const padFooter = () => {
  const footer = document.querySelector("footer");
  let padFooter = document.querySelector<HTMLDivElement>("#padFooter");

  if (footer && padFooter) {
    padFooter.style.height = `${footer.offsetHeight}px`;
  }
};
