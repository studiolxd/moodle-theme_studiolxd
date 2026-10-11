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
  aunque en la marca corresponderían a `number-badge` (`12px`, peso `300`).
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
| 6. ⏸ Campos: interlineado | Sí | ahora `1.5` Bootstrap · sugerido `1` `control.line-height` ⚠️b | = claro |
| 7. ⏸ Campos: padding horizontal | Sí | ahora `0.75rem` Bootstrap · sugerido `1rem` `control.padding-inline` | = claro |
| 8. ⏸ Campos: altura | Sí | ahora `38px` (derivada) · sugerido `2.5rem` `control.height` ⚠️c | = claro |
| 9a. Botones: interlineado | Sí | `1` `button.line-height` (aplicado en la fase 5, botones) | = claro |
| 9b. Botones: padding horizontal | Sí | `2rem` `button.padding-inline` (aplicado en la fase 5, botones) | = claro |
| 9c. Botones: altura | Sí | `2.5rem` `button.height` ⚠️c (aplicado en la fase 5, botones) | = claro |

**Notas**

- **a.** Los valores son los mismos que ya tenía Moodle, así que no cambia nada visible: solo pasan a salir de los
  tokens. La correspondencia de índices es mía, porque la escala de la marca tiene un paso más (`0.75rem`,
  `spacing.3`) que la de Bootstrap no tiene.
- **b.** Pendiente de la fase 5: Bootstrap usa `.form-control` también para los `textarea`, que en la marca mantienen
  interlineado `1.5` (`textarea.line-height`); hay que separar primero los campos de una línea de los de varias.
- **c.** Bootstrap no tiene variable de altura: la deriva del padding vertical. La altura se obtiene con un padding
  calculado solo con tokens: `(altura − tamaño de fuente × interlineado − 2 × grosor de borde) / 2`, con
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

