# Correspondencia de la marca con Moodle

Cómo se traducen los tokens de `@studiolxd/brand` 56.0.0 (prefijo `$slxd-`) a Moodle 5.3: su sistema de diseño
(MDS, `$mds-*` / `--mds-*`), Bootstrap (`$*` / `--bs-*`) y las reglas de Boost.

- **Equivalencia**: `Sí` si la marca tiene un token para ese papel; `No` si no lo tiene (el valor es entonces el de
  Moodle, y se indica de dónde sale).
- **Claro / Oscuro**: valor y token de la marca. En oscuro, los pares `surface-dark-*` de la marca no llegan al SCSS;
  se resuelven a través del token semántico `*-on-dark` al que apuntan.
- **⏸** en *Qué*: comentado en el SCSS, **no se aplica**. Se indica el valor que se ve ahora y el sugerido.
- **⚠️**: decisión propia (no sale de la marca) o pendiente; ver la nota de la sección.

Archivos: `scss/mapping/light/` (variables), `scss/mapping/dark/` (custom properties en modo oscuro) y
`scss/overrides/` (reglas CSS para lo que las variables no alcanzan).

## Fase 1 — Tipografía

`mapping/light/_typography.scss` y `overrides/_typography.scss`. La tipografía no cambia con el modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Familia sans | Sí | `"Google Sans Flex", system-ui, sans-serif` `font-family.sans` | = claro |
| 2. Familia monoespaciada | Sí | `"Google Sans Code", ui-monospace, monospace` `font-family.mono` | = claro |
| 3. Familia serif | Sí | `"Libre Bodoni"` `font-family.serif` ⚠️a | = claro |
| 4. Peso del cuerpo y de los componentes MDS | Sí | `300` `font-weight.default` | = claro |
| 5. Peso de negrita (`strong`, `.fw-bold`, `dt`) | Sí | `500` `font-weight.emphasis` | = claro |
| 6. Peso de los títulos | Sí | `500` `text.heading.font-weight` | = claro |
| 7. Peso de `.lead` | Sí | `300` `font-weight.default` | = claro |
| 8. Cuerpo: tamaño | Sí | `1rem` `text.font-size` | = claro |
| 9. Cuerpo: interlineado | Sí | `1.5` `text.line-height` | = claro |
| 10. Cuerpo: tracking | Sí | `0em` `text.letter-spacing` | = claro |
| 11. Párrafo pequeño | Sí | `0.875rem` / `1.65` `text.paragraph.small.*` | = claro |
| 12. `.lead` (tagline del hero) | Sí | `1.25rem` / `1.3` `text.paragraph.large.*` | = claro |
| 13. h1 | Sí | `2.5rem` / `1.1` / `-0.02em` `text.h1.*` | = claro |
| 14. h2 | Sí | `2rem` / `1.1` / `-0.02em` `text.h2.*` | = claro |
| 15. h3 | Sí | `1.75rem` / `1.1` / `-0.02em` `text.h3.*` | = claro |
| 16. h4 | Sí | `1.5rem` / `1.3` / `-0.02em` `text.h4.*` | = claro |
| 17. h5 | Sí | `1.25rem` / `1.3` / `0em` `text.h5.*` | = claro |
| 18. h6 | Sí | `1rem` / `1.3` / `0em` `text.h6.*` | = claro |
| 19. Margen bajo los títulos | Sí | `0.5em` `text.heading.space-after` | = claro |
| 20. Interlineado base de los títulos | No | `1.2` Bootstrap ⚠️b | = claro |
| 21. Fuente para japonés | No | Noto Sans JP + reserva de Boost | = claro |
| 22. Peso de tag, barra de progreso y avatar | Sí | `300` ahora; la marca usa `500` ⚠️c | = claro |

**Notas**

- **a.** Se carga, pero Moodle no tiene ningún sitio para una serif.
- **b.** La marca solo define interlineado por nivel; no tiene efecto visible porque cada nivel lo sobrescribe.
- **c.** Pendiente de la fase 5 (componentes).

## Fase 2 — Color

`mapping/light/_color.scss`, `mapping/light/components/_links.scss`, `mapping/dark/_color.scss`,
`overrides/_utilities.scss`, `overrides/_alerts.scss` y `overrides/_links.scss`.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Texto | Sí | `#111E30` `color.text.on-light` | `#FFFFFF` `color.text.on-dark` |
| 2. Texto énfasis (MDS) | Sí | `#111E30` `color.text.on-light` ⚠️a | `#FFFFFF` `color.text.on-dark` ⚠️a |
| 3. Texto secundario | Sí | `#4A4A4A` `color.text.muted-on-light` | `#D0D0D0` `color.text.muted-on-dark` |
| 4. Texto inverso | Sí | `#FFFFFF` `color.text.on-dark` | `#111E30` `color.text.on-light` |
| 5. Títulos | Sí | `#111E30` `text.heading.color` | `#FFFFFF` `color.text.on-dark` |
| 6. Fondo de página | Sí | `#FFFFFF` `color.bg.light` | `#111E30` `color.bg.dark` |
| 7. Paneles | Sí | `#FFFFFF` `color.bg.light` | `#111E30` `color.bg.dark` |
| 8. Superficie secundaria (MDS) | Sí | `#F2F2F2` `color.surface.secondary-on-light` | `#4A4A4A` `color.surface.secondary-on-dark` |
| 9. `.bg-light` | Sí | `#FFFFFF` `color.bg.light` | `#111E30` `color.bg.dark` |
| 10. ⏸ `.bg-dark` | Sí | ahora `#1D2125` Moodle · sugerido `#FFFFFF` `color.bg.light` ⚠️b | ahora `#1D2125` Moodle · sugerido `#111E30` `color.bg.dark` |
| 11. ⏸ Bordes | Sí | ahora `#DEE2E6` Bootstrap · sugerido `#D0D0D0` `color.border.default-on-light` ⚠️c | ahora `#495057` Boost · sugerido `#FFFFFF` `color.text.on-dark` |
| 12. ⏸ Borde sutil (MDS) | Sí | ahora `#E9ECEF` MDS · sugerido `#D0D0D0` `color.border.default-on-light` ⚠️c | ahora `#292E33` Boost · sugerido `#FFFFFF` `color.text.on-dark` |
| 13. ⏸ Interactivo primario (MDS) | Sí | ahora `#0F6CBF` MDS · sugerido `#111E30` `color.primary` ⚠️d | ahora `#0F6CBF` MDS · sugerido `#FFFFFF` `color.text.on-dark` |
| 14. ⏸ Primario hover/activo (MDS) | Sí | ahora `#0C5699` / `#094173` MDS · sugerido `#111E30` | ahora = claro · sugerido `#FFFFFF` |
| 15. Primario deshabilitado, fondo | Sí | `#4A4A4A` `button.primary.disabled-bg` | `#4A4A4A` `color.disabled.bg-on-dark` ⚠️e |
| 16. Primario deshabilitado, borde | Sí | `#4A4A4A` `button.primary.disabled-border` | `#6B6B6B` `color.disabled.border-on-dark` |
| 17. `$primary` (Guardar, `.bg-primary`…) | Sí | `#111E30` `color.primary` | `#FFFFFF` `color.text.on-dark` ⚠️f |
| 18. Color de foco (MDS) | Sí | `#111E30` `button.primary.focus-ring-color` | `#FFFFFF` `link.surface-dark-focus-ring-color` |
| 19. Anillo de foco (Bootstrap) | Sí | `rgba(17,30,48,.75)` Bootstrap ⚠️g | `rgba(124,131,141,.75)` Boost ⚠️g |
| 20. Peligro: relleno | Sí | `#B30000` `color.destructive-fill` | `#B30000` `color.destructive-fill` |
| 21. Peligro: texto | Sí | `#B30000` `color.error-text-on-light` | `#FF8585` `color.error-text-on-dark` |
| 22. Éxito: relleno | Sí | `#006616` `color.success-fill` | `#006616` `color.success-fill` |
| 23. Éxito: texto | Sí | `#006616` `color.success-text-on-light` | `#00CC2C` `color.success-text-on-dark` |
| 24. Aviso: relleno | Sí | `#FFCD00` `color.warning-fill` | `#FFCD00` `color.warning-fill` |
| 25. Aviso: texto | Sí | `#111E30` `color.warning-fill-text` | `#FFCD00` Boost ⚠️h |
| 26. Info | Sí | `#111E30` `tag.info-bg` | `#FFFFFF` `tag.surface-dark-info-bg` |
| 27. ⏸ Secondary (Cancelar, insignias neutras) | Sí | ahora `#CED4DA` Moodle · sugerido `#4A4A4A` `tag.neutral-bg` | ahora = claro · sugerido `#F2F2F2` `color.surface.inverse-on-dark` |
| 28. Alerta primary (por defecto) | Sí | `#111E30`, texto y borde `#FFFFFF` `alert.*` | `#FFFFFF`, texto `#111E30` `alert.surface-dark-*` |
| 29. Alerta danger | Sí | `#B30000`, texto `#FFFFFF` `alert.error-*` | = claro (relleno universal) |
| 30. Alerta success | Sí | `#006616`, texto `#FFFFFF` `alert.success-*` | = claro (relleno universal) |
| 31. Alerta warning | Sí | `#FFCD00`, texto `#111E30` `alert.warning-*` | = claro (relleno universal) |
| 32. Alerta info | Sí | `#111E30`, texto y borde `#FFFFFF` `banner.info-*` | `#FFFFFF`, texto `#111E30` ⚠️i |
| 33. ⏸ Primario bg-subtle | No | ahora `#CFD2D6` Bootstrap | ahora `#03060A` Boost |
| 34. ⏸ Primario border-subtle | No | ahora `#A0A5AC` Bootstrap | ahora `#0A121D` Boost |
| 35. ⏸ Primario text-emphasis | No | ahora `#070C13` Bootstrap | ahora `#A0A5AC` Boost |
| 36. ⏸ Superficie "strong" (MDS) | No | ahora `#E9ECEF` MDS | ahora `#292E33` Boost |
| 37. Fondo secundario | Sí | `#20E38E` `color.support-1` | `#20E38E` `color.support-1` |
| 38. Fondo terciario | Sí | `#F05E1C` `color.support-2` | `#F05E1C` `color.support-2` |
| 39. ⏸ Color de énfasis (Bootstrap) | No | ahora `#000000` Bootstrap | ahora `#FFFFFF` Boost |
| 40. ⏸ Escala de grises | No | ahora `#F8F9FA`…`#1D2125` Moodle | ahora invertida por Boost |
| 41. Enlaces: color | Sí | `#111E30` `link.color` | `#FFCD00` `link.surface-dark-color` |
| 42. Enlaces: hover | Sí | `#111E30` `link.hover-color` | `#FFCD00` `link.surface-dark-hover-color` |
| 43. Enlaces: subrayado | Sí | reposo sí, hover no `link.decoration-line`, `link.hover-decoration-line` | = claro (sin par oscuro) |

**Notas**

- **a.** Moodle tiene dos niveles y la marca uno; los he juntado.
- **b.** En Moodle `.bg-dark` siempre lleva texto blanco (insignias de actividad, insignia de tareas, pie de
  depuración): con el fondo de página en claro quedaría blanco sobre blanco.
- **c.** `color.border.default-on-light` es un borde sutil que la marca apenas usa.
- **d.** Con esta fila comentada, los componentes MDS (checkbox, radio, paginación, botón MDS) siguen en el azul de
  Moodle. El interruptor de modo edición no, porque Boost lo pinta con `$primary`.
- **e.** El botón primario de la marca no tiene par oscuro para "deshabilitado"; uso el semántico.
- **f.** `.btn-primary` no sigue esta variable (Bootstrap compila sus colores): en oscuro sigue prusia hasta la fase 5.
  `.bg-primary.text-white` (contadores, insignias) lleva texto prusia en oscuro, como `tag.surface-dark-primary-color`.
- **g.** Fase 3: la marca lo quiere sólido y de 2px.
- **h.** En oscuro MDS pone este texto sobre un tinte oscuro (`#665200`), no sobre el relleno: el prusia no se leería.
- **i.** La marca no tiene "info" en Alert (sí en Banner, sin par oscuro); uso el de la alerta por defecto.
