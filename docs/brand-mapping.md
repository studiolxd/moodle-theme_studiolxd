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
