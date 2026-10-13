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
| 19. Anillo de foco (Bootstrap) | Sí | `#111E30` sólido `input.focus-ring-color` (forma: fase 3) | `#FFFFFF` sólido `link.surface-dark-focus-ring-color` |
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
| 37. ⏸ Fondo secundario | Sí | ahora `#E9ECEF` Bootstrap · sugerido `#20E38E` `color.support-1` ⚠️k | ahora `#343A40` Boost · sugerido `#20E38E` `color.support-1` |
| 38. ⏸ Fondo terciario | Sí | ahora `#F8F9FA` Bootstrap · sugerido `#F05E1C` `color.support-2` ⚠️k | ahora `#292E33` Boost · sugerido `#F05E1C` `color.support-2` |
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
- **f.** `.btn-primary` no sigue esta variable (Bootstrap compila sus colores): es el botón lavanda de la marca en los
  dos modos (fase 5, botones).
  `.bg-primary.text-white` (contadores, insignias) lleva texto prusia en oscuro, como `tag.surface-dark-primary-color`.
- **h.** En oscuro MDS pone este texto sobre un tinte oscuro (`#665200`), no sobre el relleno: el prusia no se leería.
- **i.** La marca no tiene "info" en Alert (sí en Banner, sin par oscuro); uso el de la alerta por defecto.
- **l.** En oscuro, Boost recalculaba las clases de texto `.text-primary`, `.text-info`, `.text-danger` y `.text-success`
  aclarando su color; ahora toman los tokens de las filas 17, 26, 21 y 23 (`overrides/_utilities.scss`).
- **k.** No está claro dónde usa Moodle estos fondos (entre otros, el hover de los botones de icono, la mensajería y
  los popovers de notificaciones).

## Fase 3 — Forma

`mapping/light/_shape.scss`, `mapping/light/components/_badges.scss`, `overrides/_badges.scss` y, para el color del
anillo en oscuro, `mapping/dark/_color.scss`. La forma no cambia
con el modo; el anillo de foco toma su color de `--mds-focus-default`, que es prusia en claro y blanco en oscuro.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Radio de esquinas (Bootstrap sm…xxl, MDS xs…xxl) | Sí | `0px` `border-radius.default` | = claro |
| 2. Píldoras (`.rounded-pill`, píldora MDS) | Sí | `9999px` `border-radius.round` | = claro |
| 3. Insignias (`.badge`) = Tag de la marca | Sí | píldora `9999px`, `0.875rem`, peso `500`, interlineado `1`, padding `0.25rem` × `0.75rem` `tag.*` ⚠️e | = claro |
| 4. Grosor de borde | Sí | `1px` `border-width.default` | = claro |
| 5. Sombras (`.shadow*`, desplegables, popovers, modales) | Sí | `none` `shadow.default` ⚠️a | = claro |
| 6. Sombras de los cajones laterales (Boost) | Sí | `none` `shadow.default` | = claro |
| 7. Anillo de foco: grosor | Sí | `2px` `border-width.focus` | = claro |
| 8. Anillo de foco: color | Sí | `#111E30` `input.focus-ring-color` | `#FFFFFF` `link.surface-dark-focus-ring-color` |
| 9. Foco de checkbox, radio y `.focus-ring` | Sí | anillo exterior `2px` con hueco `1px` del color de la página `checkbox.focus-ring-width`, `checkbox.focus-ring-offset` ⚠️f | = claro, con los colores del modo |
| 10. Foco de campos de texto y selects | Sí | anillo interior `2px` con hueco `1px` del fondo del campo, borde en la tinta `input.focus-ring-*`, `input.focus-border-color` | = claro, con los colores del modo |
| 11. Desplazamiento del foco de MDS | Sí | `1px` `checkbox.focus-ring-offset` ⚠️b | = claro |
| 12. Foco de los botones (Boost) | Sí | ahora contorno `2px` oscurecido + filete interior blanco, Boost ⚠️c | ahora Boost ⚠️c |
| 13. Radios escritos a mano en Boost | Sí | ahora `1rem` (curso, compatibilidad BS4), `4px` (mensajes, formularios, core, Atto), `3px` (actividades) ⚠️d | = claro |
| 14. Sombras escritas a mano en Boost | Sí | ahora presentes en administración, mensajes, core, layout, cajones y menú de acciones ⚠️d | = claro |

**Notas**

- **a.** Incluye la sombra interior (`$box-shadow-inset`): la marca dice que ningún elemento proyecta sombra.
- **b.** MDS usa un único desplazamiento para todos sus componentes; el de la marca es `1px` en checkbox, enlace y
  campos, y `4px` en los botones: en la fase 5 se sobrescribe solo en ellos (`.mds-btn`, `button.focus-ring-offset`).
- **c.** La marca pone el anillo a `4px` del botón (`button.focus-ring-offset`). Pendiente de la fase 5 (botones).
- **d.** No dependen de variables: solo se pueden cambiar con reglas CSS, zona por zona, cuando aparezcan.
- **e.** Boost fija tamaño y peso a `inherit` (la insignia tomaba el tamaño de su contexto, p. ej. dentro de un
  título); ahora es siempre `14px`, como el Tag. Los contadores (mensajes sin leer) también son `.badge` en Moodle,
  aunque en la marca corresponden a `number-badge`; van en la fase 5 (contadores).
- **f.** Anchos y huecos son tokens; los colores van por `var(--mds-focus-default)` y `var(--bs-body-bg)`, que valen
  los tokens de cada modo (fase 2, filas 6 y 18): un valor SCSS compilado no cambiaría con el modo.

## Fase 4 — Espaciado y tallas

`mapping/light/_spacing.scss`. El espaciado no cambia con el modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Unidad base (`$spacer`) | Sí | `1rem` `spacing.4` | = claro |
| 2. Escala de Bootstrap (spacers 1–6: `m-*`, `p-*`, `gap-*`) | Sí | `0.25` / `0.5` / `1` / `1.5` / `2` / `3rem` `spacing.1`, `2`, `4`, `5`, `6`, `7` ⚠️a | = claro |
| 3. Espaciado de MDS (xxs, xs, sm, md, xl, xxl) | Sí | `0.25` / `0.5` / `0.75` / `1` / `2` / `3rem` `spacing.1`, `2`, `3`, `4`, `6`, `7` | = claro |
| 4. ⏸ Espaciado de MDS lg | No | ahora `1.25rem` MDS · sugerido `1.5rem` `spacing.5` | = claro |
| 5. Margen bajo los títulos (componentes MDS) | Sí | `0.5em` `text.heading.space-after` (antes `0.5rem`) | = claro |
| 6. Campos: interlineado | Sí | `1` `input.line-height` (aplicado en la fase 5, campos) | = claro |
| 7. Campos: padding horizontal | Sí | `1rem` `input.padding-inline` (aplicado en la fase 5, campos) | = claro |
| 8. Campos: altura | Sí | `2.5rem` `input.height` ⚠️c (aplicado en la fase 5, campos) | = claro |
| 9a. Botones: interlineado | Sí | `1` `button.line-height` (aplicado en la fase 5, botones) | = claro |
| 9b. Botones: padding horizontal | Sí | `2rem` `button.padding-inline` (aplicado en la fase 5, botones) | = claro |
| 9c. Botones: altura | Sí | `2.5rem` `button.height` ⚠️c (aplicado en la fase 5, botones) | = claro |

**Notas**

- **a.** Los valores son los mismos que ya tenía Moodle, así que no cambia nada visible: solo pasan a salir de los
  tokens. La correspondencia de índices es mía, porque la escala de la marca tiene un paso más (`0.75rem`,
  `spacing.3`) que la de Bootstrap no tiene.
- **b.** Bootstrap usa `.form-control` también para los `textarea`, que en la marca mantienen interlineado `1.5`
  (`textarea.line-height`): en la fase 5 (campos) el textarea tiene su propia regla.
- **c.** Bootstrap no tiene variable de altura: la deriva del padding vertical. La altura se obtiene con un padding
  calculado solo con tokens (`functions/_sizing.scss`): `(altura − tamaño × interlineado − 2 × borde) / 2`, con
  `control.height`, `control.font-size`, `control.line-height`, `control.border-width` en los campos y
  `button.height`, `button.font-size`, `button.line-height`, `button.border-width` en los botones.

## Fase 5 — Componentes

### Botones

`mapping/light/components/_buttons.scss` (tipo y tallas) y `overrides/_buttons.scss` (colores de cada variante en
los dos modos, foco). Las alturas se obtienen con un padding calculado solo con tokens (fase 4, nota c).

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Peso | Sí | `300` `button.font-weight` | = claro |
| 2. Tamaño de fuente e interlineado | Sí | `1rem` / `1` `button.font-size`, `button.line-height` | = claro |
| 3. Grosor de borde | Sí | `1px` `button.border-width` | = claro |
| 4. Padding horizontal | Sí | `2rem` `button.padding-inline` ⚠️a | = claro |
| 5. Altura | Sí | `2.5rem` `button.height` | = claro |
| 6. Talla pequeña (`.btn-sm`) | Sí | `2rem` alto, `1.5rem` lateral, `0.875rem` `button.sm-*` | = claro |
| 7. Talla grande (`.btn-lg`) | Sí | `3rem` alto, `4rem` lateral, `1.25rem` `button.lg-*` | = claro |
| 8. Grosor del anillo de foco | Sí | `2px` `button.focus-ring-width` | = claro |
| 9. `.btn-primary` (Guardar, Enviar) | Sí | `#BAABFF` con texto `#111E30`; hover y activo `#FFCD00`; deshabilitado `#4A4A4A` con texto `#FFFFFF` `button.primary.*` ⚠️b | = claro ⚠️b |
| 10. `.btn-secondary` (Cancelar, acciones secundarias) | Sí | outline: transparente, texto y borde `#111E30`; hover y activo relleno `#111E30` con texto `#FFFFFF`; deshabilitado `#D0D0D0` `button.outline.*` ⚠️c | texto y borde `#FFFFFF`; hover relleno `#FFFFFF` con texto `#111E30` `button.outline.surface-dark-*`; deshabilitado `#D0D0D0` / `#6B6B6B` `color.disabled.*-on-dark` ⚠️d |
| 11. `.btn-outline-primary`, `.btn-outline-secondary` | Sí | = fila 10 ⚠️e | = fila 10 |
| 12. `.btn-danger`, `.btn-outline-danger` | Sí | outline rojo: texto y borde `#B30000`, relleno `#B30000` con texto `#FFFFFF` en hover `button.destructive.*` ⚠️f | texto y borde `#FF8585` `color.destructive-text-on-dark`; hover relleno `#B30000` (universal) |
| 13. Anillo de foco | Sí | contorno `2px` sólido a `0.25rem` del botón, sin filete interior, `#111E30`; destructivo `#B30000` `button.focus-ring-*` | `#FFFFFF`; destructivo `#FF8585` |
| 14. ⏸ Hover de los botones de icono (`.btn-icon`) | Sí | ahora `#E9ECEF` (fondo secundario) · sugerido relleno `#111E30` con icono `#FFFFFF` `button.ghost.hover-*` ⚠️g | ahora `#343A40` · sugerido relleno `#FFFFFF` con icono `#111E30` |
| 15. ⏸ `.btn-link`: padding horizontal | Sí | ahora `2rem` (heredado) · sugerido `0` `button.text.padding-inline` | = claro |
| 16. `.btn-link`: peso, color, subrayado, deshabilitado | Sí | `300`, `#111E30` subrayado (fase 2, enlaces), deshabilitado `#4A4A4A` `button.text.*` | `#FFCD00` subrayado; deshabilitado `#D0D0D0` `button.text.surface-dark-disabled-color` |
| 17. Desplazamiento del foco de los botones MDS | Sí | `0.25rem` `button.focus-ring-offset` | = claro |
| 18. ⏸ Colores de los botones MDS (`.mds-btn`) | Sí | ahora `#0F6CBF` MDS (fase 2, fila 13) | ahora `#0F6CBF` MDS |
| 19. `.btn-success`, `.btn-warning` | No | relleno `#006616` / `#FFCD00` (rellenos de la fase 2), hover calculado por Bootstrap | = claro |
| 20. `.btn-light`, `.btn-subtle-*` | No | Bootstrap / Boost | Bootstrap / Boost |

**Notas**

- **a.** Los botones de Moodle quedan bastante más anchos (antes `0.75rem` por lado).
- **b.** El botón primario de la marca no tiene par oscuro (solo su anillo de foco): es lavanda en los dos modos. Así
  se resuelve el `.btn-primary` invisible en oscuro de la fase 2. Para el borde en activo uso el del hover, porque la
  marca no define uno propio (es el mismo amarillo).
- **c.** En la marca, `Cancelar` es el botón outline. En la de outline tampoco hay borde propio para activo: uso el
  del hover.
- **d.** El outline no tiene par oscuro para deshabilitado; uso los semánticos de deshabilitado en oscuro.
- **e.** La marca tiene un único outline (prusia); las variantes outline de color de Bootstrap pasan a ser ese.
- **f.** Antes `.btn-danger` era un relleno rojo; en la marca el destructivo es un outline rojo que se rellena en
  hover. Deshabilitado, como el outline.
- **g.** Los botones de icono serían el ghost de la marca; es correspondencia mía. Su hover es el fondo secundario
  (fase 2, fila 37).

### Campos de texto, textarea y select

`mapping/light/components/_fields.scss`, `overrides/_fields.scss` y, para el error en oscuro,
`mapping/dark/_color.scss`. Fondo, texto y placeholder ya los pinta Bootstrap con propiedades que siguen al modo
(`--bs-body-bg`, `--bs-body-color`, `--bs-secondary-color`), que valen los tokens de la marca de cada modo (fase 2).

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Fondo | Sí | `#FFFFFF` `input.bg` | `#111E30` `input.surface-dark-bg` |
| 2. Texto | Sí | `#111E30` `input.color` | `#FFFFFF` `input.surface-dark-color` |
| 3. Placeholder | Sí | `#4A4A4A` `input.placeholder-color` | `#D0D0D0` `input.surface-dark-placeholder-color` |
| 4. Borde | Sí | `#111E30` `input.border-color` (antes gris) | `#FFFFFF` `input.surface-dark-border-color` |
| 5. Deshabilitado | Sí | fondo `#F2F2F2`, texto `#4A4A4A`, borde `#D0D0D0` `input.disabled-*` | fondo `#4A4A4A`, texto `#D0D0D0`, borde `#6B6B6B` `input.surface-dark-disabled-*` |
| 6. Error: borde y mensaje | Sí | `#B30000` `input.error-border-color` | `#FF8585` `input.surface-dark-error-border-color` |
| 7. Peso y tamaño | Sí | `300` / `1rem` `input.font-weight`, `input.font-size` | = claro |
| 8. Talla normal | Sí | `2.5rem` alto, interlineado `1`, `1rem` lateral `input.height`, `input.line-height`, `input.padding-inline` ⚠️a | = claro |
| 9. Tallas sm y lg (`.form-control-sm/-lg`) | Sí | sm `2rem`, `0.75rem` lateral, `0.875rem`; lg `3rem`, `1.5rem`, `1.25rem` `input.sm-*`, `input.lg-*` | = claro |
| 10. Select: padding y flecha | Sí | `1rem` lateral `select.padding-inline`; flecha `#111E30` `select.color` | flecha `#FFFFFF` `color.text.on-dark` |
| 11. Textarea | Sí | interlineado `1.5`, padding `1rem`, mínimo cuatro filas `textarea.*` | = claro |
| 12. Foco con error | Sí | anillo interior `2px` con hueco `1px`, `#B30000` `input.error-focus-ring-color` | `#FF8585` `color.error-text-on-dark` |
| 13. ⏸ Icono de validación | No | ahora icono rojo de Bootstrap dentro del campo · sugerido sin icono ⚠️b | = claro |

**Notas**

- **a.** Los campos pasan de `38px` a `40px` de alto, y su padding lateral de `0.75rem` a `1rem`.
- **b.** La marca señala el error con el borde y el mensaje, sin icono; el campo de error no tiene token de icono.


### Checkbox, radio e interruptor

`mapping/light/components/_checks.scss`, `overrides/_checks.scss` y, para el interruptor de MDS en oscuro,
`mapping/dark/_color.scss`. Bootstrap compila los colores de marcado y deshabilitado y dibuja la marca, el punto y la
bolita como SVG de color fijo: el modo oscuro, el radio sin relleno y la pista del interruptor van como reglas.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Tamaño de checkbox y radio | Sí | `1.25em` `checkbox.size`, `radio.size` (antes `1em`) | = claro |
| 2. Borde | Sí | `1px` `#111E30` `checkbox.border-*` | `#FFFFFF` `checkbox.surface-dark-border-color` |
| 3. Forma | Sí | checkbox cuadrado `checkbox.border-radius`; radio redondo `radio.border-radius` | = claro |
| 4. Fondo | Sí | transparente `checkbox.bg` | = claro |
| 5. Checkbox marcado | Sí | relleno `#111E30` con la marca de la marca `#FFFFFF`, de `0.65em` girada `15deg` `checkbox.checked-bg`, `checkbox.check-*` ⚠️a | relleno `#FFFFFF` con marca `#111E30` `checkbox.surface-dark-checked-bg`, `…-check-color` |
| 6. Radio marcado | Sí | sin relleno; borde y punto `#111E30`, punto de `0.5em` `radio.dot-*` | borde y punto `#FFFFFF` `radio.surface-dark-dot-color` |
| 7. Deshabilitado | Sí | borde `#D0D0D0`; checkbox marcado relleno `#D0D0D0`; punto `#D0D0D0`; sin atenuar `checkbox.disabled-*`, `radio.disabled-*` | `#D0D0D0` `color.text.muted-on-dark` |
| 8. Error | Sí | borde `#B30000` (campos, fila 6) | `#FF8585` |
| 9. Interruptor: pista | Sí | `2.75em` × `1.5em`, píldora, sin borde; `#D0D0D0` apagado y `#111E30` encendido `switcher.track-*` | `#FFFFFF` apagado y `#BAABFF` encendido `switcher.surface-dark-track-*` |
| 10. Interruptor: bolita | Sí | `#FFFFFF`, también al enfocarlo `switcher.thumb-bg` ⚠️c | `#111E30` `switcher.surface-dark-thumb-bg` |
| 11. Interruptor deshabilitado | Sí | opacidad `0.4` `switcher.disabled-opacity` | = claro |
| 12. Interruptor de modo edición (MDS) | Sí | pista `#D0D0D0` / `#111E30` encendida, bolita `#FFFFFF` `switcher.*` ⚠️d | pista `#FFFFFF` / `#BAABFF` encendida, bolita `#111E30` `switcher.surface-dark-*` |
| 13. Checkbox indeterminado | Sí | sin relleno; línea `#111E30` del `60%` del ancho y `1px` `checkbox.border-color`, `checkbox.border-width` ⚠️e | línea y borde `#FFFFFF` `checkbox.surface-dark-border-color` |

**Notas**

- **a.** Tamaño, giro y color salen de los tokens; el polígono de la marca de verificación está en el CSS del
  Checkbox de la marca (no es un token) y se copia en `functions/_checks.scss`.
- **c.** Corrige un fallo de la fase 3: el color de foco de la bolita era una propiedad CSS dentro de un SVG, que no
  funciona, y la bolita desaparecía al enfocar. En oscuro Boost la pintaba blanca translúcida.
- **d.** El interruptor de la marca no tiene colores de hover: el hover mantiene los de reposo. El estado encendido se
  pone sobre el propio interruptor, porque el interactivo primario de MDS sigue sin decidir (fase 2, fila 13).
- **e.** Tercer estado de un checkbox ("en parte", p. ej. *seleccionar todo* con solo algunas filas marcadas); solo se
  activa por JavaScript y el core de Moodle no lo usa. La marca lo dibuja como una línea; su CSS no rellena la caja
  y la línea es del color de la marca de verificación (blanca), así que se ha decidido caja vacía con la línea en el
  color del borde. El `60%` está en el CSS del Checkbox de la marca (no es un token).

### Etiquetas y mensajes de formulario

`mapping/light/components/_form-text.scss` y `overrides/_form-text.scss`. Etiquetas y ayuda son la tinta en la marca
(`label.color`, `form.helper-color`), que `--bs-body-color` ya vale en cada modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Etiquetas: tamaño, peso e interlineado | Sí | `0.875rem`, `500`, `1.5` `label.*` (antes el cuerpo) | = claro |
| 2. Etiquetas: color | Sí | `#111E30` `label.color` | `#FFFFFF` `label.surface-dark-color` |
| 3. Separación de la etiqueta al campo | Sí | `0.5rem` `input-field.gap` | = claro |
| 4. Texto de ayuda | Sí | `0.875rem`, `300`, `#111E30` (antes gris) `form.helper-*` ⚠️a | `#FFFFFF` `form.surface-dark-helper-color` |
| 5. Separación del campo a la ayuda y al error | Sí | `0.5rem` `input-field.gap` (antes `0.25rem`) | = claro |
| 6. Mensaje de error | Sí | `0.875rem`, `#B30000` `form.error-*` | `#FF8585` `form.surface-dark-error-color` |
| 7. Leyendas de los grupos (`legend`) | Sí | peso `500`, margen `0.5em` `text.heading.font-weight`, `fieldset.legend-space-after` | = claro |
| 8. ⏸ Leyendas: tamaño | Sí | ahora `1.5rem` Bootstrap · sugerido `1.5rem` `text.h4.font-size` ⚠️b | = claro |
| 9. ⏸ Separación entre campos | Sí | ahora `1rem` (`.mb-3` de Moodle) · sugerido `1.5rem` `form.gap` ⚠️c | = claro |

**Notas**

- **a.** Moodle añade `.text-muted` a su texto de ayuda; se sobrescribe para que sea tinta, como en la marca.
- **b.** En la marca el tamaño de la leyenda se elige en cada grupo (es un título con talla); no hay uno por defecto.
- **c.** Moodle separa sus filas de formulario con la utilidad `.mb-3`: cambiarlo exige sobrescribirla dentro de los
  formularios.

### Barra superior

`overrides/_navbar.scss` y `mapping/light/components/_navbar.scss`. La barra es el AppHeader de la marca; la navegación
principal (las pastillas de MDS de Moodle) toma las Tabs de la marca sin línea ni fondo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Altura | Sí | `56px` (`3.5rem`) más el borde `app-header.content-height`, `app-header.padding-block` ⚠️a | = claro |
| 2. Borde inferior | Sí | `1px` `#111E30` `app-header.border-*` (antes gris) | `#FFFFFF` `app-header.surface-dark-border-color` |
| 3. Fondo | Sí | `#FFFFFF` `app-header.bg` (Moodle usa `.bg-body`) | `#111E30` `app-header.surface-dark-bg` |
| 4. Navegación principal: color | Sí | `#4A4A4A` `tabs.trigger-color` | `#D0D0D0` `tabs.surface-dark-trigger-color` |
| 5. Navegación principal: hover | Sí | `#111E30` sin fondo `tabs.trigger-hover-color` | `#FFFFFF` `tabs.surface-dark-trigger-hover-color` |
| 6. Navegación principal: página actual | Sí | `#111E30`, peso `500`, sin fondo ni línea `tabs.trigger-active-*` | `#FFFFFF` `tabs.surface-dark-trigger-active-color` |
| 7. Navegación principal: tamaño y peso | Sí | `1rem`, `300` `tabs.trigger-font-*` (antes `0.875rem`, `500`) | = claro |
| 8. Navegación principal: foco | Sí | contorno `2px` a `1px` en la tinta `tabs.focus-ring-*` (MDS, fase 3) | `#FFFFFF` |
| 9. Navegación principal: padding | Sí | `0.75rem` × `1rem` `tabs.trigger-padding-*` (antes `0.5rem` × `0.75rem`) | = claro |

**Notas**

- **a.** Boost suma px a `$navbar-height` en muchos sitios, así que la altura se calcula desde los tokens y se pasa a px
  con la raíz por defecto del navegador (`16px`): esa conversión es mía. Los enlaces de la barra (`$moremenu-height`)
  toman la misma altura; Boost la usa también para la barra de la navegación secundaria.

### Navegación secundaria

`overrides/_secondary-nav.scss`. Las pestañas bajo el título de la página (las pastillas de MDS de Moodle) toman las
Tabs de la marca en su variante pastilla.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Color de las pestañas | Sí | `#4A4A4A` `tabs.trigger-color` | `#D0D0D0` `tabs.surface-dark-trigger-color` |
| 2. Hover | Sí | `#111E30`, sin fondo `tabs.trigger-hover-color` ⚠️a | `#FFFFFF` `tabs.surface-dark-trigger-hover-color` |
| 3. Pestaña actual | Sí | relleno `#111E30`, texto `#FFFFFF`, peso `500`, sin el punto de Moodle `tabs.trigger-pill-active-*`, `tabs.trigger-active-weight` | relleno `#BAABFF`, texto `#111E30` `tabs.surface-dark-trigger-pill-active-*` |
| 4. Tamaño y peso | Sí | `1rem`, `300` `tabs.trigger-font-*` (antes `0.875rem`, `500`) | = claro |
| 5. Padding | Sí | `0.75rem` × `1rem` `tabs.trigger-padding-*` | = claro |
| 6. Línea inferior de la fila | Sí | sin línea (la variante pastilla no la lleva) | = claro |
| 7. Altura de la fila | Sí | `56px`, la de la barra superior (`$moremenu-height`) ⚠️b | = claro |
| 8. Foco | Sí | contorno `2px` a `1px` en la tinta `tabs.focus-ring-*` (MDS, fase 3) | `#FFFFFF` |

**Notas**

- **a.** En la variante pastilla de la marca el hover solo cambia el color del texto, sin fondo.
- **b.** Boost usa la misma altura para los enlaces de la barra superior y para esta fila.

### Migas de pan

`mapping/light/components/_breadcrumb.scss` y `overrides/_breadcrumb.scss`. Enlaces, separador y página actual son la
tinta en la marca, que `--bs-body-color` ya vale en cada modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Tamaño | Sí | `0.875rem` `breadcrumb.font-size` | = claro |
| 2. Padding vertical | Sí | `0.25rem` `breadcrumb.padding-block` (antes `0.5rem`) | = claro |
| 3. Separación entre elementos | Sí | `0.5rem` `breadcrumb.gap` | = claro |
| 4. Enlaces y separador (`/`) | Sí | `#111E30` `breadcrumb.link-color`, `breadcrumb.separator-color` (el separador antes gris) | `#FFFFFF` `breadcrumb.surface-dark-*` |
| 5. Página actual | Sí | `#111E30`, peso `500` `breadcrumb.current-*` | `#FFFFFF` `breadcrumb.surface-dark-current-color` |
| 6. ⏸ Página actual: subrayado | Sí | ahora subrayada · sugerido sin subrayado ⚠️a | = claro |
| 7. ⏸ Interlineado | Sí | ahora `1.5` (el del cuerpo) · sugerido `1` `breadcrumb.line-height` ⚠️b | = claro |

**Notas**

- **a.** En la marca la página actual es texto, no enlace; en Moodle es el último enlace (`aria-current="page"`).
- **b.** La marca la quiere en una sola línea; Moodle deja que los elementos largos salten de línea.

### Menús desplegables

`mapping/light/components/_dropdowns.scss` y `overrides/_dropdowns.scss`. Son el Menú de la marca. Su resaltado es la
superficie invertida (fondo la tinta, texto el fondo de la página), que `--bs-body-color` y `--bs-body-bg` ya valen en
cada modo; Boost compila esos colores en muchas reglas propias (menú "Más", búsqueda del calificador, ítems de color),
que así siguen también al modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Panel: fondo y texto | Sí | `#FFFFFF` / `#111E30` `menu.bg`, `menu.item-color` | `#111E30` / `#FFFFFF` `menu.surface-dark-item-color` |
| 2. Panel: borde | Sí | `1px` `#111E30` `menu.border-*` (antes translúcido) | `#FFFFFF` (antes `#495057` de Boost) ⚠️c |
| 3. Panel: padding | Sí | `0.5rem` × `0.5rem` `menu.padding-*` (antes `0.5rem` × `0`) | = claro |
| 4. Panel: radio y sombra | Sí | `0`, sin sombra `menu.border-radius`, `menu.shadow` (fase 3) | = claro |
| 5. Ítems: tamaño, padding e interlineado | Sí | `1rem`, `0.5rem` × `1rem`, `1.3` `menu.item-*` (antes `0.25rem` de padding vertical y `1.5`) | = claro |
| 6. Ítem resaltado (puntero, teclado o pulsado) | Sí | relleno `#111E30`, texto `#FFFFFF` `menu.item-highlighted-*` ⚠️a | relleno `#FFFFFF`, texto `#111E30` `menu.surface-dark-item-highlighted-*` |
| 7. Rótulos de sección | Sí | `0.875rem`, `500`, `#4A4A4A` `menu.label-*` | `#D0D0D0` `menu.surface-dark-label-color` |
| 8. Separador | Sí | `1px` `#111E30`, margen `0.5rem` `menu.separator-*` | `#FFFFFF` `menu.surface-dark-separator-color` |
| 9. Ítems deshabilitados | Sí | opacidad `0.4` `menu.disabled-opacity` | = claro |
| 10. Ítem destructivo (`.text-danger`) | Sí | texto `#B30000`; resaltado relleno `#B30000` con texto `#FFFFFF` `menu.item-destructive-*` | texto `#FF8585`; resaltado igual (relleno universal) |
| 11. Ítem seleccionado (página actual, opción elegida) | Sí | solo peso `500`, sin relleno ni marca ✓ `menu.item-selected-font-weight` ⚠️b | = claro |

**Notas**

- **a.** Boost fija sin `!default` el hover de los menús y pone a mano el texto blanco del resaltado en el menú "Más" y
  en los ítems con texto de color: esas reglas se sobrescriben para que sigan al resaltado de cada modo.
- **b.** Moodle lo marca con `.active`, `aria-current` o `aria-selected`; Bootstrap lo rellenaba y Boost le ponía una
  marca ✓ delante, con hueco a la izquierda para ella. Al resaltarlo se invierte como cualquier otro ítem.
- **c.** Boost pone en oscuro un borde gris (`var(--bs-gray-300)`, `#495057`) a tarjetas, menús y modales con un
  selector más específico que el de Bootstrap, que tapaba el mapeo: se sobrescribe en modo oscuro para que vuelva a
  ser el borde del componente.


### Tarjetas

`mapping/light/components/_cards.scss` y `overrides/_cards.scss`. Las tarjetas de Moodle (bloques, tarjetas de curso,
paneles del área personal) son la tarjeta outline de la marca: el fondo de la página con un borde en la tinta, que
`--bs-body-bg` y `--bs-body-color` ya valen en cada modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Fondo | Sí | `#FFFFFF` `card.outline-bg` (antes `var(--bs-white)`) | `#111E30` `card.surface-dark-outline-bg` (antes `#343A40` de Boost) |
| 2. Borde | Sí | `1px` `#111E30` `card.outline-border-*` (antes gris claro) | `#FFFFFF` `card.surface-dark-outline-border-color` (antes `#495057` de Boost) ⚠️c |
| 3. Radio | Sí | `0` `card.border-radius` | = claro |
| 4. Padding | Sí | `1rem` lateral y arriba, `0.75rem` abajo `card.padding-*` | = claro |
| 5. Separación bajo el título | Sí | `0.25rem` `card.header-row-gap` (antes `0.5rem`) ⚠️a | = claro |
| 6. Fondo de cabecera y pie | Sí | sin fondo propio, el de la tarjeta (antes un tinte del texto al 3 %) | = claro |
| 7. Tarjeta seleccionada (`.card.active`) | Sí | fondo y borde `#BAABFF`, texto `#111E30` `card.primary-bg`, `card.primary-color` ⚠️b | = claro (sin par oscuro) |

**Notas**

- **a.** La correspondencia es mía: es la separación entre el título y la descripción en la cabecera de la tarjeta.
- **b.** En el core solo la usan las tarjetas de factores de la autenticación en varios pasos (`tool_mfa`). El lavanda
  contrasta en cualquier superficie, así que es igual en los dos modos, y el texto de dentro (títulos, enlaces, texto
  secundario) mantiene los colores de la superficie clara también en oscuro.
- **c.** Boost pone en oscuro un borde gris (`var(--bs-gray-300)`, `#495057`) a tarjetas, menús y modales con un
  selector más específico que el de Bootstrap, que tapaba el mapeo: se sobrescribe en modo oscuro para que vuelva a
  ser el borde del componente.

### Contadores

`overrides/_badges.scss`. Los contadores de no leídos y los de los popovers de la barra son el `number-badge` de la
marca (no un Tag): la cifra es de `12px` con peso `300`, en un círculo de `1rem` que se hace píldora con más de un
dígito. Llegan con las clases que les pone Moodle, y sus rellenos son los del rol, que son universales: no cambia
nada con el modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Mensajería: contador en la lista de conversaciones y de mensajes (cajón) | Sí | píldora prusia, cifra `#FFFFFF` `number-badge.primary-*` (fondo `color.primary`) | píldora blanca, cifra prusia (la corrección de `.bg-primary.text-white`, fase 2) |
| 2. Mensajería: contador de no leídos de cada sección | Sí | = fila 1 | = fila 1 |
| 3. Mensajería: contador en cada conversación (popover) | Sí | círculo rojo `#B30000`, cifra `#FFFFFF` `number-badge.error-*` (`$danger`) | = claro (relleno universal) |
| 4. Notificaciones: contador del popover | Sí | círculo rojo `#B30000`, cifra `#FFFFFF` (Boost lo pinta a mano con `$danger`) | = claro (relleno universal) |
| 5. Forma y tipografía de todos | Sí | `12px`, peso `300`, interlineado `1`, `1rem` redondo, `0.25rem` lateral `number-badge.*` | = claro |

**Notas**

- **a.** Moodle los marca como `.badge` (Tag) o los pinta a mano Boost (`.count-container`): se sobrescriben por sus
  clases, no hay variables que tocar. Los que llevan `.bg-primary.text-white` heredan la corrección de texto prusia
  en oscuro de la fase 2.
- **b.** El resto de insignias con `.bg-primary.text-white` (sección actual, "Oculto para estudiantes") son etiquetas
  con texto, no cifras: siguen siendo el Tag de la marca.

### Componentes MDS que Moodle renderiza

`overrides/_mds-components.scss`, junto con lo ya hecho en `_navbar.scss`, `_secondary-nav.scss` y `_checks.scss`.
Moodle 5.3 renderiza cinco componentes del sistema de diseño (`@moodlehq/design-system`): NavPill (barra superior y
navegación secundaria), Switch (interruptor de modo edición), Button (bloque timeline), y los dos de aquí. Los otros
once del paquete (Avatar, Breadcrumb, Checkbox, Choicebox, CloseButton, FavouriteButton, Link, Pagination,
ProgressBar, Radio, Tooltip) Moodle aún no los usa: cuando los use, heredarán los tokens ya mapeados.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. MDS badge "Vencida" (`.mds-badge--danger`, timeline) | Sí | relleno `#B30000`, texto `#FFFFFF` `tag.error-*` | = claro (relleno universal) |
| 2. MDS badge contador (`.mds-badge--secondary`, timeline) | Sí | relleno `#111E30`, texto `#FFFFFF` `number-badge.primary-*` | relleno `#FFFFFF`, texto `#111E30` (par surface-dark, invertido como el Tag) |
| 3. MDS badge: forma y tipografía | Sí | píldora, `14px`, peso `500`, interlineado `1`, padding `0.25rem` × `0.75rem` `tag.*` | = claro |
| 4. MDS badge sutil (`.mds-badge--subtle`) | No | no lo renderiza Moodle; si un plugin lo hace, queda el tinte de MDS | = claro |
| 5. MDS activity icon (`.mds-activity-icon`, timeline) | Parcial | sin losa de categoría (`container="none"`, Moodle) ni talla de la marca: la dibuja MDS | = claro |

**Notas**

- **a.** Los tokens del Badge de MDS (`--mds-bg-feedback-danger-default`, `--mds-text-inverse`…) ya valen los de la
  marca (fase 2), pero MDS compila sus colores: la píldora de "Vencida" y el contador necesitan la regla.
- **b.** La marca no tiene un Badge propio: la etiqueta es el Tag y la cifra es el number badge, como en las filas 1
  y 2. La píldora del contador se distingue del Tag solo en su padding, el del number badge.
- **c.** El icono de actividad del timeline se dibuja sin losa (sin los colores por categoría de MDS, que la marca
  tampoco tiene) y su talla no está en la escala de iconos de la marca: no hay nada que mapear, salvo que la marca
  defina una losa o una talla para él.

### Modales y botón de cerrar

`mapping/light/components/_modals.scss`, `overrides/_modals.scss` y `functions/_close-button.scss`. Los modales de
Moodle (`core/modal` y todos los que se construyen sobre él: confirmaciones, formularios en modal, selector de
actividades) son el Modal de la marca: un panel con un único padding alrededor, sin líneas entre cabecera, cuerpo y
pie, y con el CloseButton de la marca en la cabecera. El fondo y el texto son los de la página, que `--bs-body-bg` y
`--bs-body-color` ya valen en cada modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Velo | Sí | `#000000` al `0.6` `modal.backdrop-*` (antes al `0.5`) | = claro |
| 2. Panel: fondo y texto | Sí | `#FFFFFF` / `#111E30` `modal.bg`, `modal.title-color` (ya lo eran) | `#111E30` / `#FFFFFF` `modal.surface-dark-bg`, `modal.surface-dark-title-color` (ya lo eran) |
| 3. Panel: borde | Sí | `1px` transparente `modal.border-*` (antes gris translúcido `rgba(0,0,0,.175)`) | `1px` `#FFFFFF` `modal.surface-dark-border-color` (antes `#495057` de Boost) |
| 4. Panel: radio y sombra | Sí | `0`, sin sombra `modal.border-radius`, `modal.shadow` (ya lo eran, fase 3) | = claro |
| 5. Ancho | Sí | `560px` `modal.max-width` en la talla por defecto (antes `500px`) ⚠️a; ⏸ `90vw` de ancho y `90dvh` de alto máximo `modal.width`, `modal.max-height` (ahora: margen de `0.5rem`, `1.75rem` desde `576px`, y sin tope de alto salvo en los modales con scroll) | = claro |
| 6. Padding | Sí | `2rem` alrededor del panel `modal.padding-*` (antes `1rem` en cabecera, cuerpo y pie por separado) | = claro |
| 7. Líneas bajo la cabecera y sobre el pie | Sí | ninguna (antes `1px` gris) | = claro |
| 8. Separación de la cabecera | Sí | `1rem` entre título y aspa y bajo la cabecera `modal.header-gap`; el aspa, centrada en la primera línea del título | = claro |
| 9. Pie | Sí | `2rem` sobre el pie `modal.footer-margin-block-start`; `0.75rem` entre botones `modal.footer-gap` (antes `0.5rem`) | = claro |
| 10. Título | Sí | `2rem`, peso `500`, interlineado `1.1`, entero (salta de línea, sin recorte) `modal.title-*` (antes `1.25rem` de `.fs-5` con `1.5`, cortado a una línea) ⚠️b | = claro (color `#FFFFFF`) |
| 11. Pie en diálogos estrechos | Sí | por debajo de `480px` de diálogo, botones apilados a todo el ancho con la acción principal arriba (antes: fila que salta de línea) ⚠️c | = claro |
| 12. Entrada | Sí | desliza `0.5rem` en `250ms` `ease-in-out` `modal.content-enter-offset`, `modal.transition-*` (antes `50px` en `0.3s` `ease-out`) | = claro |
| 13. Aspa: caja y glifo | Sí | caja de `2.5rem`, aspa de `24px` con trazo de `1px` `modal.close-size`, `modal.close-icon-size`, icono `close` ⚠️d (antes aspa gruesa de `16px` de Bootstrap en una caja de `2rem`) | = claro |
| 14. Aspa: color | Sí | `#111E30` opaco y sin hover `modal.close-color` (antes negro al `50 %`) | `#FFFFFF` `modal.surface-dark-close-color` (antes blanco al `50 %` por un filtro invertido) |
| 15. Aspa: foco | Sí | anillo `2px` en la tinta a `2px` `modal.close-focus-ring-*` (antes sombra de `2px` con hueco de `1px`) | anillo `#FFFFFF` |
| 16. Capas (z-index) | Sí | no se aplica: se quedan los de Moodle (`1055` / `1050`) ⚠️e | = claro |

**Notas**

- **a.** La correspondencia es mía (validada): la marca tiene un solo ancho (`90vw` hasta `560px`) y el contenido
  largo hace scroll dentro del panel; no tiene tallas mayores. Es el de la talla por defecto de Moodle. Las tallas
  `.modal-sm` (`300px`), `.modal-lg` (`800px`) y `.modal-xl` (`1140px`), que usan el selector de actividades y
  muchos formularios, no tienen equivalente en la marca y se quedan como están.
- **b.** La marca pinta siempre el título entero. Moodle lo renderiza como `h2.modal-title.fs-5.text-truncate`
  (`1.25rem` con `!important` y cortado a una línea): se deshacen las dos clases, y como el título puede ocupar
  varias líneas, el aspa se alinea con la primera, como en el Modal de la marca.
- **c.** La marca lo decide por el ancho del diálogo (consulta de contenedor), no de la ventana. Los modales del core
  ponen la acción principal la última (Cancelar, Guardar), así que al apilar queda arriba. Pendiente de revisar en
  pantalla los pies que no son solo botones (selector de actividades, plugins): si alguno se rompe, se excluye.
- **d.** Validado. El glifo no es un token: es el icono `close` del componente `Icon` de la marca (dos trazos a 45° sobre una
  retícula de 24), copiado como máscara para que tome el color del modo. La marca no tiene hover para el aspa: solo
  marca el foco.
- **e.** Validado. Los z-index de la marca (`300` el panel, `200` el velo) son relativos a su propia app; en Moodle el modal
  tiene que quedar por encima de la barra superior, los cajones y los desplegables, que usan sus propias capas.
- Moodle no tiene descripción bajo el título del modal (`modal.description-*`), así que no se mapea. Los diálogos
  antiguos de YUI (`.moodle-dialogue-base`) y el aspa de las alertas y los toasts no entran aquí: van con sus
  componentes.

### Cajones e índice del curso

`mapping/light/components/_drawers.scss` y `overrides/_drawers.scss`. Los cajones de Moodle (índice del curso,
bloques y navegación móvil) son la Sidebar de la marca, y el índice del curso es su SidebarNav. En las páginas de
curso Moodle 5.3 ancla los cajones junto al contenido, como paneles; en pantallas estrechas se abren sobre la página.
El fondo y la tinta son los de la página, que `--bs-body-bg` y `--bs-body-color` ya valen en cada modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| **Cajones** | | | |
| 1. Fondo | Sí | `#FFFFFF` `sidebar.bg` (antes gris `#E9ECEF` el izquierdo y `#F8F9FA` el derecho) | `#111E30` `sidebar.surface-dark-bg` (antes `#292E33` / `#1D2125`) |
| 2. Borde | Sí | `1px` `#111E30` `sidebar.border-*`, en todo el contorno ⚠️a (antes sin borde) | `#FFFFFF` `sidebar.surface-dark-border-color` |
| 3. ⏸ Ancho | Sí | `15rem` (`240px`) `sidebar.width` ⚠️b (ahora `285px` el izquierdo y `315px` el derecho) | = claro |
| 4. Padding | Sí | `0.5rem` lateral `sidebar.padding-inline` (antes `0.4rem` en el contenido); `1rem` arriba y abajo de la cabecera de los cajones anclados `sidebar.padding-block` (antes `0.5rem`); ⏸ `2rem` arriba y abajo de la lista `sidebar.panel-padding-block` ⚠️c | = claro |
| 5. Sombra de la cabecera al hacer scroll | Sí | ninguna `shadow.default` (antes `0 8px 11px -7px` negro al `25 %`) | = claro |
| 6. Apertura y cierre | Sí | `250ms` `ease-in-out` `sidebar.transition-*` (antes `0.2s` `ease`) | = claro |
| 7. Velo en pantallas estrechas | Sí | `#000000` al `0.6` `sidebar.backdrop-*` (Moodle usa el velo de los modales, ya mapeado) | = claro |
| 8. Botón de cerrar el cajón | Sí | el CloseButton de la marca: caja de `2.5rem`, aspa de `24px` en la tinta, sin fondo ni hover, anillo de foco de `2px` a `2px` `close-button.*` ⚠️d (antes botón gris `#E9ECEF` de `40px`, hover `#CED4DA`) | aspa `#FFFFFF` (antes fondo `#292E33`) |
| 9. Barra de scroll | No | la de Moodle (pulgar `#6A737B`), con la pista en el nuevo fondo ⚠️e | pulgar `#CED4DA`, pista `#111E30` |
| 10. Título del cajón (nombre del curso) | Sí | `1rem`, peso `500`, `#111E30` `sidebar-nav.group-label-*`, alineado con los chevrons ⚠️f (antes peso `700`, `#4A4A4A`) | `#D0D0D0` `sidebar-nav.surface-dark-group-label-color` |
| **Índice del curso** | | | |
| 11. Sección: texto | Sí | `1rem`, peso `500`, `#111E30` `sidebar-nav.group-label-*` (antes `0.875rem`, peso `700`, `#4A4A4A`) | `#D0D0D0` `sidebar-nav.surface-dark-group-label-color` (= antes) |
| 12. Sección: padding y chevron | Sí | `0.5rem` × `0.75rem`, `0.5rem` tras el chevron `sidebar-nav.group-trigger-*` (antes `0.5rem` × `0.5rem` y `4px`) ⚠️g | = claro |
| 13. Actividad: texto | Sí | `1rem`, peso `300`, interlineado `1.3`, `#111E30` `sidebar-nav.item-*` (antes `0.875rem`, `#4A4A4A`) | `#FFFFFF` `sidebar-nav.surface-dark-item-color` (antes `#D0D0D0`) |
| 14. Actividad: padding y sangría | Sí | `0.5rem` arriba y abajo, `1rem` a la derecha `sidebar-nav.item-padding-*`; el nombre empieza donde el título de su sección ⚠️g (antes `0.5rem` y sangría de `1.5rem`) | = claro |
| 15. Separación entre actividades y entre secciones | Sí | `0.25rem` `sidebar-nav.item-gap` (antes `0`) | = claro |
| 16. Hover | Sí | sin cambio, la tinta del ítem (antes negro `#000000`) | sin cambio, `#FFFFFF` (antes `#F8F9FA`) |
| 17. Foco | Sí | anillo de `2px` en la tinta, separado `2px` `sidebar-nav.focus-ring-*` (antes sombra de `2px` con hueco de `1px`) | anillo `#FFFFFF` |
| 18. Página actual (`.pageitem`) | Sí | solo peso `500`, sin relleno `sidebar-nav.item-active-font-weight` ⚠️h (antes relleno `#111E30` con texto blanco) | peso `500` (antes relleno `#111E30` sobre `#292E33`, casi invisible) |
| 19. Sección actual (barra izquierda de `3px`) | No | la barra de Moodle, en la tinta `#111E30` ⚠️i | barra `#FFFFFF` (antes `#111E30`, invisible) |
| 20. Elementos ocultos a estudiantes (`.dimmed`) | Sí | `#4A4A4A`, también en hover `sidebar-nav.item-empty-color` ⚠️j (antes `#6A737B`, negro en hover) | `#D0D0D0` `sidebar-nav.surface-dark-item-empty-color` (antes `#CED4DA`) |
| 21. Ítem seleccionado en edición (`.active`) | No | el de Moodle: fondo `#F8F9FA`, borde `#DEE2E6` | `#1D2125` / `#495057` |
| 22. Ítem que se arrastra (`.dragging`) | No | el tinte de información de Moodle | = claro |
| 23. Iconos de finalización | No | los de la fase 2 (éxito y error) | = claro |
| 24. Radio de los ítems | Sí | `0` `sidebar-nav.item-border-radius` (ya lo era) | = claro |

**Notas**

- **a.** La Sidebar de la marca es una columna a toda altura con borde en el lado del contenido; en Moodle el cajón
  flota como un panel, así que el borde va en todo el contorno, como en las tarjetas. Solo en el cajón abierto: el
  índice cerrado mide `0` de ancho y dejaría la línea.
- **b.** Los cajones anclados se colocan a partir de esos anchos, y `240px` deja menos sitio a los nombres de las
  actividades; la marca tampoco distingue entre cajón izquierdo y derecho. Se aplicaría en `$drawer-left-width` y
  `$drawer-right-width`.
- **c.** El padding de la cabecera de los cajones anclados pasa por la variable de Boost, que lo descuenta de la
  posición del cajón, así que la cabecera sigue alineada con el título de la página. El de la lista puede quedar con
  demasiado aire bajo la cabecera: comentado hasta verlo.
- **d.** La correspondencia es mía: la marca cierra sus paneles con el CloseButton. El icono de Moodle se oculta y
  se dibuja el aspa de la marca, como en los modales.
- **e.** La marca no define la barra de scroll. Boost toma la pista del fondo del cajón, así que la sigue sola.
- **f.** La cabecera de la Sidebar de la marca lleva el logo; el nombre del curso como etiqueta de grupo es decisión
  mía. Se alinea con los chevrons de las secciones (`0.75rem`).
- **g.** La marca pone el chevron tras el texto y sangra los ítems con el hueco de un icono de `2rem` que el índice no
  tiene. Moodle lo pone delante, y se queda ahí; el chevron de la sección y el hueco del icono de finalización de la
  actividad miden lo mismo (`20px`, el de Moodle) con los `0.5rem` de la marca detrás, así que el nombre de la
  actividad empieza donde el título de su sección, como en la marca.
- **h.** La marca marca la entrada activa solo con el peso, sin relleno ni color, también si está oculta (sigue en el
  gris) o restringida.
- **i.** La marca no tiene marca de sección actual; se queda la barra de Moodle en la tinta, que sigue el modo.
- **j.** El token es el de una entrada vacía de la marca, que se lee pero no invita a pulsar; usarlo para los
  elementos ocultos a estudiantes es decisión mía. Como en la marca, no cambia en hover.
- Los bloques del cajón derecho ya son tarjetas de la marca, y la insignia de sección actual es el Tag. El menú de
  navegación móvil (`.drawer-primary`) recibe las filas 1 a 8. El cajón de mensajería es otro componente.

### Pestañas

`overrides/_tabs.scss`. Las pestañas de contenido de Moodle (`tabtree` en actividades e informes, las pestañas
dinámicas y las de los ajustes de administración, todas `.nav-tabs`) son las Tabs de la marca, y `.nav-pills` su
variante pastilla. La navegación secundaria también es `.nav-tabs`, pero lleva `.more-nav` y ya está mapeada (NavPill):
por eso la marca se pone en las propiedades de las pestañas de contenido y no en las variables de Bootstrap, que
llegarían a las dos. Los colores son el texto atenuado, la tinta y la línea de cada modo, que `--bs-secondary-color` y
`--bs-body-color` ya valen.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| 1. Línea bajo la lista | Sí | `1px` `#111E30` `tabs.list-border-*` (antes `#DEE2E6`) | `#FFFFFF` `tabs.surface-dark-list-border-color` (antes `#495057`) |
| 2. Separación entre pestañas | Sí | `0.25rem` `tabs.list-gap` (antes `0`) | = claro |
| 3. Pestaña: padding y tipografía | Sí | `0.75rem` × `1rem`; `1rem`, peso `300`, interlineado `1.15` `tabs.trigger-*` (antes `0.5rem` × `1rem` e interlineado `1.5`) | = claro |
| 4. Pestaña inactiva: color | Sí | `#4A4A4A` `tabs.trigger-color` (antes `#111E30`, el color de enlace) | `#D0D0D0` `tabs.surface-dark-trigger-color` (antes amarillo `#FFCD00`, el enlace en oscuro) |
| 5. Hover | Sí | texto `#111E30`, sin borde ni fondo `tabs.trigger-hover-color` (antes recuadro gris `#E9ECEF`) | texto `#FFFFFF` (antes recuadro `#343A40`) |
| 6. Pestaña activa | Sí | texto `#111E30`, peso `500`, indicador de `1px` `#111E30` bajo ella `tabs.trigger-active-*`, `tabs.trigger-indicator-*` ⚠️a (antes recuadro con borde `#DEE2E6` y fondo blanco, texto negro `#000000`) | texto e indicador `#FFFFFF` (antes recuadro con borde `#495057`) |
| 7. Radio | Sí | `0` `tabs.trigger-border-radius` (ya lo era) | = claro |
| 8. Pestaña deshabilitada | Sí | opacidad `0.4` `tabs.trigger-disabled-opacity` (antes texto `#4A4A4A`) | = claro (antes `#D0D0D0`) |
| 9. Foco | Sí | anillo de `2px` en la tinta, separado `1px` `tabs.focus-ring-*` (antes sombra de `2px` con hueco de `1px`) | anillo `#FFFFFF` |
| 10. Transición | Sí | color en `150ms` `ease-in-out` `tabs.transition-*` (antes color, fondo y borde en `0.15s` `ease-in-out`) | = claro |
| 11. Pastillas (`.nav-pills`), activa | Sí | relleno `#111E30`, texto `#FFFFFF`, peso `500` `tabs.trigger-pill-active-*` (antes igual, sin el peso) | relleno lavanda `#BAABFF`, texto `#111E30` `tabs.surface-dark-trigger-pill-active-*` (antes relleno `#111E30` sobre el fondo `#111E30`: solo se veía el texto) |
| 12. Pestañas en pantallas estrechas (menos de `768px`) | No | la variante pastilla de la marca (fila 11), sin pista, sin línea ni indicador ⚠️b (antes control segmentado de Boost: pista gris `#E9ECEF`, pestañas blancas y la activa rellena `#111E30`) | pastilla lavanda con texto `#111E30` (antes pista `#292E33`) |
| 13. Aire entre la lista y el contenido | Sí | se quedan los márgenes de Moodle (`1rem` en `tabtree`, `1.5rem` en las dinámicas) ⚠️c; la marca: `1rem` `tabs.content-padding-block` | = claro |

**Notas**

- **a.** Es la marca, no una decisión mía: su indicador mide y vale lo mismo que la línea de la lista, así que se
  pinta encima y no se distingue; la pestaña activa se reconoce por el peso y por el color, frente al gris de las
  inactivas. Aquí lo dibuja el borde inferior de la pestaña, que Bootstrap ya monta sobre la línea.
- **b.** La marca no tiene control segmentado; llevarlo a la variante pastilla es decisión mía. Boost lo aplica por
  debajo de `md` (`768px`), y las pestañas se siguen repartiendo el ancho como en Boost.
- **c.** Moodle los pone con utilidades en el HTML (`mb-3`, `mb-4`), no con padding del panel; igualarlos quitaría
  `0.5rem` a las pestañas dinámicas.

### Tablas y paginación

`mapping/light/components/_tables.scss` y `overrides/_tables.scss`. Las tablas de Moodle (`html_table`, con
`generaltable table table-hover`, y las tablas flexibles de participantes, informes y calificaciones, con
`table table-striped table-hover`) son la Table de la marca; la barra de páginas y la de iniciales (`.pagination-sm`)
son su Pagination. El texto y las líneas de la tabla son la tinta, y el botón outline de la paginación, con su hover y
su página actual invertidos, la tinta y el fondo de la página, que `--bs-body-color` y `--bs-body-bg` ya valen en
cada modo.

| Qué | Equivalencia | Claro | Oscuro |
|---|---|---|---|
| **Tablas** | | | |
| 1. Texto | Sí | `#111E30`; `1rem`, peso `300`, interlineado `1.5` `table.color`, `table.font-*` (antes negro `#000000`) | `#FFFFFF` `table.surface-dark-color` (= antes) |
| 2. Fondo | Sí | transparente `table.bg` (antes el de la página, `#FFFFFF`) | = claro (antes `#111E30`) |
| 3. Separadores entre filas | Sí | `1px` `#111E30` `table.border-width`, `table.row-border-color` (antes `#DEE2E6`) | `#FFFFFF` `table.surface-dark-row-border-color` (antes `#495057`) |
| 4. Borde superior de la tabla | No | ninguno ⚠️a (antes `1px` `#DEE2E6` de Boost) | = claro (antes `#495057`) |
| 5. Cabecera | Sí | peso `500`, borde inferior de `1px` `#111E30` `table.header-*` (antes peso `700` y borde `#DEE2E6`) | borde `#FFFFFF` `table.surface-dark-header-border-color` |
| 6. Padding de celdas y cabecera | Sí | `0.75rem` × `0.75rem` `table.cell-padding-*`, `table.header-padding-*` (antes `0.5rem` en las tablas flexibles; `0.75rem` en las `generaltable`) | = claro |
| 7. Tablas compactas (`.table-sm`) | Sí | `0.5rem` de padding, `0.875rem` `table.sm-*` (antes `0.25rem` y `1rem`) | = claro |
| 8. Filas alternas (`.table-striped`) | No | sin rayado ⚠️b (antes tinte negro al `3 %`) | = claro (antes tinte blanco al `3 %`) |
| 9. Hover de fila | Sí | sin hover ⚠️c (antes tinte negro al `7.5 %`) | = claro (antes tinte blanco al `7.5 %`) |
| 10. Fila seleccionada (`.table-active`) | Sí | tinta `#111E30`, peso `500`, sin fondo `table.row-selected-*` (antes tinte negro al `10 %`) | lavanda `#BAABFF`, peso `500` `table.surface-dark-row-selected-color` (antes tinte blanco al `10 %`) |
| 11. Cabecera ordenable | Sí | el rótulo hereda la tipografía y el color de la cabecera (peso `500`, `#111E30`), sin subrayado ⚠️d (antes `#111E30`, el color de enlace, subrayado) | hereda `#FFFFFF` (antes amarillo `#FFCD00` y subrayado) |
| 12. Icono de ordenación | Sí | `#111E30` `table.sort-icon-active-color` ⚠️d (antes el color del enlace) | `#FFFFFF` `table.surface-dark-sort-icon-active-color` |
| 13. Foco en la cabecera | Sí | anillo de `2px` en la tinta, separado `1px` `table.focus-ring-*` (antes sombra de `2px` con hueco de `1px`) | anillo `#FFFFFF` |
| 14. Pie (`tfoot`) | Sí | fondo `#F2F2F2`, borde superior de `1px` `#111E30`, peso `500` `table.footer-*` (antes sin estilo propio) | fondo `#4A4A4A`, borde `#FFFFFF` `table.surface-dark-footer-*` |
| 15. Columna fija (`.sticky-column`) | Sí | fondo opaco `#FFFFFF` `table.sticky-bg` ⚠️e (antes heredaba el de la fila) | `#111E30` `table.surface-dark-sticky-bg` |
| 26. Última fila | Sí | sin línea inferior (antes `1px` `#DEE2E6`) | = claro (antes `#495057`) |
| **Paginación** | | | |
| 16. Botón de página: caja y texto | Sí | cuadrado de `2.5rem`, padding lateral `0.5rem`, `1rem` con interlineado `1` `pagination.btn-*` (antes `0.375rem` × `0.75rem`, unos `38px` de alto) | = claro |
| 17. Separación entre botones | Sí | `0.25rem` `pagination.controls-gap` (antes pegados, con los bordes solapados) | = claro |
| 18. Botón en reposo | Sí | outline: borde de `1px` y texto `#111E30`, sin fondo `pagination.btn-*` (antes borde `#DEE2E6` y fondo blanco) | borde y texto `#FFFFFF` `pagination.surface-dark-btn-*` (antes borde `#495057` y texto amarillo `#FFCD00`) |
| 19. Hover | Sí | invertido: relleno `#111E30`, texto `#FFFFFF` `pagination.btn-hover-*` (antes fondo `#F8F9FA`) | relleno `#FFFFFF`, texto `#111E30` (antes fondo `#292E33`) |
| 20. Página actual | Sí | relleno `#111E30`, texto `#FFFFFF`, peso `500` `pagination.btn-current-*` (antes igual, sin el peso) | relleno `#FFFFFF`, texto `#111E30` (antes relleno `#111E30` sobre el fondo `#111E30`: solo se veía el texto) |
| 21. Puntos suspensivos (`…`) | Sí | texto `#4A4A4A`, sin caja `pagination.ellipsis-color` ⚠️f (antes caja de botón deshabilitado: fondo `#E9ECEF` y borde `#DEE2E6`) | `#D0D0D0` (antes fondo `#343A40`) |
| 22. Botón deshabilitado | Sí | borde y texto `#D0D0D0`, sin fondo, cursor `not-allowed` `pagination.btn-disabled-*` (antes texto `#4A4A4A` y fondo `#E9ECEF`) | `#6B6B6B` `pagination.surface-dark-btn-disabled-*` |
| 23. Foco | Sí | anillo de `2px` en la tinta, separado `1px` `pagination.focus-ring-*` (antes sombra de `2px` con hueco de `1px`) | anillo `#FFFFFF` |
| 24. Tallas sm y lg (`sm` en la barra de iniciales) | Sí | sm: `2rem`, `0.875rem`, padding `0.25rem`; lg: `3rem`, `1.25rem`, padding `0.75rem` `pagination.sm-*`, `pagination.lg-*` (antes sm `0.25rem` × `0.5rem`; lg `0.75rem` × `1.5rem`) | = claro |
| 25. Transición | Sí | `150ms` `ease` `pagination.transition-*` (antes `0.15s` `ease-in-out`) | = claro |

**Notas**

- **a.** La marca separa las filas y marca la cabecera con su borde inferior, sin línea encima de la tabla; quitar
  la de Boost es decisión mía. En `.generaltable` cada celda lleva también su línea superior, que se quita en la
  primera fila.
- **b.** La marca no tiene filas alternas: separa con líneas. Quitar el rayado es decisión mía (dejarlo obligaría a
  inventar el tinte).
- **c.** La marca solo marca las filas interactivas (las que se pulsan enteras), con una barra de `2px` en la tinta en
  su borde de inicio (`table.row-hover-marker-*`); en el core de Moodle no hay filas así, así que no hay hover. Si
  alguna tabla las tuviera, se les pondría la barra.
- **d.** Como en la marca, donde la cabecera ordenable es un botón dentro del `th` que hereda su tipografía y su
  color. En Moodle es un enlace (`a[data-sortable]`), al que Boost subraya y en oscuro pinta de amarillo con un
  selector de id, que se sobrescribe. Moodle solo muestra el icono de la columna ordenada, así que va siempre en el
  color activo (el de reposo, `#4A4A4A`, no se ve en el core); lo separa del rótulo con un espacio, no con el gap de
  `0.5rem` de la marca.
- **e.** Con la tabla transparente, la columna fija necesita fondo propio para tapar lo que pasa por debajo al hacer
  scroll horizontal, también en el hover, donde Boost le ponía el del hover.
- **f.** Moodle pinta los puntos suspensivos como un botón deshabilitado (`.page-item.disabled` con un `span`); en el
  core es el único deshabilitado de la paginación. Se separan para que vayan como texto, como en la marca; el estilo
  de la fila 22 queda para los plugins que los usen.

### Alertas y toasts

`mapping/light/components/_alerts.scss`, `overrides/_alerts.scss` (los colores son de la fase 2),
`overrides/_toasts.scss` y `overrides/_close-button.scss`. Las notificaciones de Moodle (`.alert`) son el Alert de
la marca, y sus toasts (`core/toast`) el Toast, que en la marca es un Alert flotante. El aspa de cerrar de modales,
cajones, alertas y toasts está ahora en un solo archivo, `overrides/_close-button.scss`; cada zona pone su talla, su
sitio y su color.

| Qué | Eq. | Claro | Oscuro |
|---|---|---|---|
| **Alertas** | | | |
| 1. Colores | Sí | fase 2 (filas 28-32) | fase 2 |
| 2. Padding | Sí | `1rem` × `1.5rem` (antes `1rem`) | = |
| 3. Borde y radio | Sí | `1px`, `0` (ya) | = |
| 4. Título | Sí | tracking `-0.02em` (antes `0`) | = |
| 5. Título → texto | Sí | `0.5rem` (ya) | = |
| 6. Aspa | Sí | CloseButton sm `2rem` ⚠️a | = |
| 7. Hueco del aspa | Sí | `3rem` (ya) | = |
| 8. `secondary`/`light`/`dark` | No | outline ⚠️b | outline |
| 9. Icono y margen | No | los de Moodle | = |
| **Toasts** | | | |
| 10. Rellenos | Sí | los del Alert ⚠️c | ⚠️c |
| 11. Borde, radio, sombra | Sí | `1px`, `0`, ninguna | = |
| 12. Padding | Sí | `1rem` × `1.5rem` (antes `0.75rem`) | = |
| 13. Texto | Sí | `1rem` / `1.5` (antes `0.875rem`) | = |
| 14. Cabecera | Sí | título del Alert ⚠️f | = |
| 15. Icono del tipo | No | el de Moodle ⚠️d | = |
| 16. Aspa | Sí | como la fila 6 | = |
| 17. Ancho máx. | Sí | `360px` (antes `350px`) | = |
| 18. Posición | Sí | esquina inferior ⚠️e | = |
| 19. Entrada/salida | Sí | `250ms` `ease-out` (antes `0.15s`) | = |
| 20. z-index | Sí | el de Moodle | = |

**Notas**

- **a.** Caja de `2rem` a `0.5rem` de la esquina, aspa de `24px` en el color del texto de la alerta, sin hover
  (`alert.close-*`). Antes, el aspa negra de Bootstrap de `16px` al `60 %`, que sobre los rellenos prusia y rojo
  apenas se veía.
- **b.** La marca no tiene variante secundaria, clara ni oscura: son una alerta outline, sin relleno, con texto y
  borde en la tinta de la página (decisión validada). Antes, tinte gris `#F5F6F8` (oscuro `#292A2C`).
- **c.** success `#006616` y danger `#B30000` con texto blanco, warning `#FFCD00` con texto prusia: universales.
  info es la alerta neutra de la marca, que sigue el modo: prusia con texto y borde blancos en claro, blanca con texto
  prusia en oscuro. Sin tipo, la neutra en outline: el fondo de la página, con texto y borde en la tinta, opaca para
  leerse sobre el contenido (decisiones validadas). Antes, tintes al `95 %` (sin tipo, blanco al `85 %`).
- **d.** El Alert de la marca no lleva icono; se queda el de Moodle, en el color del texto (decisión mía).
- **e.** Como en la marca: a `1.5rem` de la esquina inferior derecha (`toast.inset-*`), por encima del pie fijo de
  Moodle cuando lo hay, a `0.5rem` entre sí (`toast.gap`) y el más nuevo abajo. La pila no se recoge como la de la
  marca (Moodle no la anima). Antes, arriba y centrados.
- **f.** Sin el fondo translúcido, la línea inferior ni el gris de Bootstrap: `1rem`, peso `500`, interlineado `1.3`,
  tracking `-0.02em` (`alert.title-*`).

### Barra de progreso

`mapping/light/components/_progress.scss` y `overrides/_progress.scss`. Las `.progress` de Moodle (tareas en
segundo plano con `core/progress_bar`, copia de seguridad asíncrona, suscripción de la app) son la ProgressBar de la
marca. El progreso de los cursos del área personal ya es solo texto, y ninguna barra de Moodle lleva la cifra dentro.

| Qué | Eq. | Claro | Oscuro |
|---|---|---|---|
| 1. Carril: fondo | Sí | `#F2F2F2` (antes `#E9ECEF`) | `#4A4A4A` (antes `#343A40`) |
| 2. Carril: borde | Sí | `1px` `#111E30` (antes no) | `#FFFFFF` |
| 3. Relleno | Sí | `#111E30` (ya) | `#FFFFFF` (antes `#111E30`) |
| 4. Relleno: borde | Sí | `1px` `#111E30` ⚠️a | `#FFFFFF` |
| 5. Alto | Sí | `1.5rem` (md) ⚠️b (antes `1rem`) | = |
| 6. Radio | Sí | `0` (ya) | = |
| 7. Avance | Sí | `250ms` `ease-in-out` (antes `0.6s`) | = |
| 8. Rayas animadas | No | sin rayas ⚠️c | = |
| 9. Error (`bg-danger`) | Sí | `#B30000` (ya, fase 2) | = |
| 10. Alto fijo de `25px` | No | `1.5rem` ⚠️d | = |

**Notas**

- **a.** La marca contornea el relleno para que los rellenos claros se distingan del carril. Su lado superior, el
  inferior y el de inicio ya caen sobre el borde del carril, así que solo se dibuja el final.
- **b.** La talla por defecto de la marca, aunque Moodle no ponga la cifra dentro (decisión validada).
- **c.** La marca no tiene rayas; el avance del relleno ya dice que la tarea sigue viva (decisión mía).
- **d.** La copia de seguridad asíncrona fija `25px` en el HTML (`style`); se fuerza a la talla de la marca con
  `!important` (decisión validada).

### Tooltips y popovers

`mapping/light/components/_tooltips.scss` y `overrides/_tooltips.scss`. Los tooltips y popovers de Bootstrap (iconos
y botones de Moodle, ayudas `?` de los formularios) son el Tooltip y el Popover de la marca. El tooltip es la
superficie invertida y el popover el panel flotante, que `--bs-body-color` y `--bs-body-bg` ya valen en cada modo.

| Qué | Eq. | Claro | Oscuro |
|---|---|---|---|
| **Tooltip** | | | |
| 1. Fondo | Sí | `#111E30` (antes `#000000`) | `#FFFFFF` (= antes) |
| 2. Texto | Sí | `#FFFFFF` (= antes) | `#111E30` (= antes) |
| 3. Opacidad | Sí | `1` (antes `0.9`) | = |
| 4. Padding | Sí | `0.25rem` × `0.5rem` (ya) | = |
| 5. Tipografía | Sí | `0.875rem` / `1.3` ⚠️a | = |
| 6. Ancho máx. | Sí | `20rem` (antes `200px`) | = |
| 7. Radio | Sí | `0` (ya) | = |
| 8. Flecha | Sí | `10px` × `5px` (antes `13` × `6px`) | = |
| 9. Separación | Sí | `0.25rem` ⚠️b (antes `6px`) | = |
| 10. Entrada | Sí | `150ms`, escala `0.95` ⚠️c | = |
| **Popover** | | | |
| 11. Fondo | Sí | `#FFFFFF` (ya) | `#111E30` (ya) |
| 12. Borde | Sí | `1px` `#111E30` (antes translúcido) | `#FFFFFF` |
| 13. Radio y sombra | Sí | `0`, ninguna (ya) | = |
| 14. Padding | Sí | `1rem` (ya) | = |
| 15. Texto | No | `1rem` ⚠️d (antes `0.875rem`) | = |
| 16. Cabecera | No | sin fondo ni línea ⚠️e | = |
| 17. Flecha | No | sin flecha ⚠️f | = |
| 18. Ancho máx. | No | `300px` de Moodle | = |
| 19. Separación | Sí | `8px` (ya) | = |
| 20. Entrada | Sí | `150ms`, escala `0.95` ⚠️c | = |

**Notas**

- **a.** La marca fija tamaño e interlineado; el peso es el del cuerpo (`300`). Bootstrap los ponía a `400` y `1.5`.
  La flecha es la geometría del SVG del Tooltip de la marca (no es un token).
- **b.** Bootstrap separa el tooltip `6px` desde su JavaScript (Popper); un margen en el lado que da al disparador lo
  acerca a los `0.25rem` de la marca (`tooltip.offset`). Los lados son físicos, así que no se invierten en RTL.
- **c.** Fundido y escala desde `0.95` hacia el disparador, en `150ms` `ease` (`*.transition-*`). Popper coloca el
  panel con un `transform` en línea, así que la escala va en la propiedad `scale`. Antes, solo fundido en `0.15s`.
- **d.** El Popover de la marca hereda el cuerpo de la superficie (decisión mía).
- **e.** La marca no tiene cabecera en el Popover; el título de la ayuda de Moodle va sin franja gris ni línea, en el
  color y el peso de los títulos, con `0.5rem` hasta el texto (decisión mía). Antes, franja `#E9ECEF` (`#343A40`).
- **f.** Como en la marca. Sin flecha, los `8px` de Bootstrap son justo la separación de la marca
  (`popover.offset`).
