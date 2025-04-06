import Alpine from "alpinejs";
import { headerData, HeaderData } from "./header-data";

export const loadAlpineData = () => {
  Alpine.data("header", (): HeaderData => headerData);
};
