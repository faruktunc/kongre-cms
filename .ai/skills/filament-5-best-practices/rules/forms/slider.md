> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Slider

export const UtilityInjection = ({extras, except, set, version, children}) => {
  const parsedExtras = (extras ?? '').split('||').filter(extra => extra !== '').map(extra => {
    const [name, type, parameter, description] = extra.split(';;');
    return {
      name,
      type,
      parameter,
      description
    };
  });
  const utilitySets = {
    '5.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action group belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    },
    '4.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    }
  };
  const baseUtilities = utilitySets[version]?.[set] || [];
  let utilities = [...parsedExtras, ...baseUtilities].sort((a, b) => a.parameter > b.parameter ? 1 : -1);
  utilities = Array.from(new Map(utilities.map(utility => [utility.parameter, utility])).values());
  const exceptList = (except ?? '').split('||');
  utilities = utilities.filter(utility => !exceptList.includes(utility.parameter));
  const links = {
    actions: `/${version}/actions/overview#action-utility-injection`,
    actionGroups: `/${version}/actions/overview#action-utility-injection`,
    formFields: `/${version}/forms/overview#field-utility-injection`,
    infolistEntries: `/${version}/infolists/overview#entry-utility-injection`,
    schemaComponents: `/${version}/schemas/overview#component-utility-injection`,
    tableColumns: `/${version}/tables/columns/overview#column-utility-injection`,
    tableFilters: `/${version}/tables/filters/overview#filter-utility-injection`
  };
  const link = links[set] ?? null;
  const parseInlineCode = text => {
    if (typeof text !== 'string') return text;
    const parts = text.split(/(`[^`]+`)/);
    return parts.map((part, i) => {
      if (part.startsWith('`') && part.endsWith('`')) {
        return <code key={i} className="rounded bg-gray-100 px-1 py-0.5 font-mono text-xs dark:bg-white/10">
            {part.slice(1, -1)}
          </code>;
      }
      return part;
    });
  };
  return <details className="border-standard mt-4 rounded-xl">
      <summary className="not-prose flex w-full cursor-pointer list-none flex-row content-center items-start rounded-t-xl rounded-b-xl px-3.5 py-3 text-sm text-gray-600 hover:bg-white/20 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-200 [&::-webkit-details-marker]:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="mt-0.5 h-3.5 w-3.5 shrink-0 text-gray-400 transition-transform">
          <path d="m9 18 6-6-6-6" />
        </svg>

        <div className="ml-2 text-left leading-tight">
          {parseInlineCode(children)}
        </div>
      </summary>

      <div className="border-t border-gray-200 px-5 py-3 dark:border-white/10">
        {link && <p className="text-sm">
            <a href={link} target="_blank">
              Learn more about utility injection.
            </a>
          </p>}

        {utilities.map((utility, index) => <div key={index} className="border-b border-gray-200 py-3 last:border-b-0 dark:border-white/10">
            <div className="flex flex-wrap items-center gap-1.5 text-sm">
              <div>{utility.name}</div>
              <div className="text-primary dark:text-primary-light font-semibold">
                {utility.parameter}
              </div>
              <div className="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs text-gray-500 dark:bg-white/10 dark:text-gray-400">
                {utility.type}
              </div>
            </div>
            <div className="mt-1.5 text-sm text-gray-600 dark:text-gray-400" dangerouslySetInnerHTML={{
    __html: utility.description
  }} />
          </div>)}
      </div>
    </details>;
};

export const AutoScreenshot = ({name, alt, version}) => {
  const [loaded, setLoaded] = useState(false);
  return <div className="not-prose border-standard relative mt-4 min-h-10 rounded-2xl">
      <div className={`absolute inset-0 flex items-center px-3.5 py-3 transition-opacity ${loaded ? 'opacity-0' : 'opacity-100'}`}>
        <svg className="h-4 w-4 animate-spin text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
        </svg>
        <span className="ml-2 text-sm text-gray-600 dark:text-gray-300">
          Loading preview
        </span>
      </div>

      <img src={`/docs/images/${version}/light/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`rounded-2xl transition-opacity dark:hidden ${loaded ? 'opacity-100' : 'opacity-0'}`} />

      <img src={`/docs/images/${version}/dark/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`hidden rounded-2xl transition-opacity dark:block ${loaded ? 'opacity-100' : 'opacity-0'}`} />
    </div>;
};

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

## Introduction

The slider component allows you to drag a handle across a track to select one or more numeric values:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
```

<AutoScreenshot name="forms/fields/slider/simple" alt="Slider" version="5.x" />

The [noUiSlider](https://refreshless.com/nouislider) package is used for this component, and much of its API is based upon that library.

<Warning>
  Due to their nature, slider fields can never be empty. The value of the field can never be `null` or an empty array. If a slider field is empty, the user will not have a handle to drag across the track.

  Because of this, slider fields have a default value set out of the box, which is set to the minimum value allowed in the [range](#controlling-the-range-of-the-slider) of the slider. The default value is used when a form is empty, for example on the Create page of a resource. To learn more about default values, check out the [`default()` documentation](./overview#setting-the-default-value-of-a-field).
</Warning>

## Controlling the range of the slider

The minimum and maximum values that can be selected by the slider are 0 and 100 by default. Filament will automatically apply validation rules to ensure that users cannot exceed these values. You can adjust these with the `range()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 40, maxValue: 80)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `range()` method also accepts functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/range" alt="Slider with a customized range" version="5.x" />

### Controlling the step size

By default, users can select any decimal value between the minimum and maximum. You can restrict the values to a specific step size using the `step()` method. Filament will automatically apply validation rules to ensure that users cannot deviate from this step size:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->step(10)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `step()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Limiting the number of decimal places

If you would rather allow the user to select any decimal value between the minimum and maximum instead of restricting them to a certain step size, you can define a number of decimal places that their selected values will be rounded to using the `decimalPlaces()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->decimalPlaces(2)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `decimalPlaces()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Controlling the behavioral padding of the track

By default, users can select any value across the entire length of the track. You can add behavioral padding to the track using the `rangePadding()` method. This will ensure that the selected value is always at least a certain distance from the edges of the track. The minimum and maximum value validation that Filament applies to the slider by default will take the padding into account to ensure that users cannot exceed the padded range:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->rangePadding(10)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `rangePadding()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/range-padding" alt="Slider with range padding" version="5.x" />

In this example, even though the minimum value is 0 and the maximum value is 100, the user will only be able to select values between 10 and 90. The padding will be applied to both ends of the track, so the selected value will always be at least 10 units away from the edges of the track.

If you would like to control the padding on each side of the track separately, you can pass an array of two values to the `rangePadding()` method. The first value will be applied to the start of the track, and the second value will be applied to the end of the track:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->rangePadding([10, 20])
```

### Right-to-left tracks

By default, a track operates left-to-right. If the user is using a right-to-left locale (e.g. Arabic), the track will be displayed right-to-left automatically. You can also force the track to be displayed right-to-left using the `rtl()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->rtl()
```

Optionally, you may pass a boolean value to control if the slider should be right-to-left or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->rtl(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `rtl()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/rtl" alt="Right-to-left slider" version="5.x" />

## Adding multiple values to a slider

If the slider is set to an array of values, the user will be able to drag multiple handles across the track within the allowed range. Make sure that the slider has a [`default()` value](./overview#setting-the-default-value-of-a-field) set to an array of values to use when a form is empty:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->default([20, 70])
```

<AutoScreenshot name="forms/fields/slider/multiple" alt="Slider with multiple values" version="5.x" />

If you're saving multiple slider values using Eloquent, you should be sure to add an `array` [cast](https://laravel.com/docs/eloquent-mutators#array-and-json-casting) to the model property:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'slider' => 'array',
        ];
    }

    // ...
}
```

## Using a vertical track

You can display the slider as a vertical track instead of horizontal, you can use the `vertical()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->vertical()
```

<AutoScreenshot name="forms/fields/slider/vertical" alt="Vertical slider" version="5.x" />

Optionally, you may pass a boolean value to control if the slider should be vertical or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->vertical(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `vertical()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Top-to-bottom tracks

By default, a vertical track operates bottom-to-top. In [noUiSlider](https://refreshless.com/nouislider), this is the [right-to-left behavior](#right-to-left-tracks). To assign the minimum value to the top of the track, you can use the `rtl(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->vertical()
    ->rtl(false)
```

<AutoScreenshot name="forms/fields/slider/top-to-bottom" alt="Top-to-bottom vertical slider" version="5.x" />

## Adding tooltips to handles

You can add tooltips to the handles of the slider using the `tooltips()` method. The tooltip will display the current value of the handle:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->tooltips()
```

<AutoScreenshot name="forms/fields/slider/tooltips" alt="Slider with tooltips" version="5.x" />

Optionally, you may pass a boolean value to control if the slider should have tooltips or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->tooltips(FeatureFlag::active())
```

When using multiple handles, multiple tooltips will be displayed, one for each handle. Tooltips also work with [vertical tracks](#using-a-vertical-track).

<AutoScreenshot name="forms/fields/slider/tooltips-vertical" alt="Vertical slider with tooltips" version="5.x" />

### Custom tooltip formatting

You can use JavaScript to customize the formatting of a tooltip. Pass a `RawJs` object to the `tooltips()` method, containing a JavaScript string expression to use. The current value to format will be available in the `$value` variable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Support\RawJs;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->tooltips(RawJs::make(<<<'JS'
        `$${$value.toFixed(2)}`
        JS))
```

<AutoScreenshot name="forms/fields/slider/tooltips-formatting" alt="Slider with custom tooltip formatting" version="5.x" />

### Controlling tooltips for multiple handles individually

If the slider is set to an array of values, you can control the tooltips for each handle separately by passing an array of values to the `tooltips()` method. The first value will be applied to the first handle, and the second value will be applied to the second handle, and so on:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->tooltips([true, false])
```

<AutoScreenshot name="forms/fields/slider/tooltips-multiple" alt="Slider with multiple tooltips" version="5.x" />

## Filling a track with color

By default, the color of the track is not affected by the position of any handles it has. When using an individual handle, you can fill the part of the track before the handle with color using the `fillTrack()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->fillTrack()
```

<AutoScreenshot name="forms/fields/slider/fill" alt="Slider with fill" version="5.x" />

Optionally, you may pass a boolean value to control if the slider should be filled or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->fillTrack(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `fillTrack()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

When using multiple handles, you must manually specify which parts of the track should be filled by passing an array of `true` and `false` values, one for each section. The total number of values should be one more than the number of handles. The first value will be applied to the section before the first handle, the second value will be applied to the section between the first and second handles, and so on:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->fillTrack([false, true, false])
```

<AutoScreenshot name="forms/fields/slider/fill-multiple" alt="Slider with multiple fills" version="5.x" />

Filling also works on [vertical tracks](#using-a-vertical-track):

<AutoScreenshot name="forms/fields/slider/fill-vertical" alt="Vertical slider with fill" version="5.x" />

## Adding pips to tracks

You can add pips to tracks, which are small markers that indicate the position of the handles. You can add pips to the track using the `pips()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips()
```

<AutoScreenshot name="forms/fields/slider/pips" alt="Slider with pips" version="5.x" />

Pips also work when there are multiple handles:

<AutoScreenshot name="forms/fields/slider/pips-multiple" alt="Slider with multiple pips" version="5.x" />

You can also add pips to [vertical tracks](#using-a-vertical-track):

<AutoScreenshot name="forms/fields/slider/pips-vertical" alt="Vertical slider with pips" version="5.x" />

### Adjusting the density of pips

By default, pips are displayed at a density of `10`. This means that for every 10 units of the track, a pip will be displayed. You can adjust this density using the `density` parameter of the `pips()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips(density: 5)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `density` parameter also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/pips-density" alt="Slider with a custom pips density" version="5.x" />

### Custom pip label formatting

You can use JavaScript to customize the formatting of a pip label. Pass a `RawJs` object to the `pipsFormatter()` method, containing a JavaScript string expression to use. The current value to format will be available in the `$value` variable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Support\RawJs;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips()
    ->pipsFormatter(RawJs::make(<<<'JS'
        `$${$value.toFixed(2)}`
        JS))
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `pipsFormatter()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/pips-formatting" alt="Slider with custom pips formatting" version="5.x" />

### Adding pip labels to steps of the track

If you are using [steps](#controlling-the-step-size) to restrict the movement of the track, you can add a pip label to each step. To do this, pass a `PipsMode::Steps` object to the `pips()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->step(10)
    ->pips(PipsMode::Steps)
```

<AutoScreenshot name="forms/fields/slider/pips-steps" alt="Slider with pips on steps" version="5.x" />

If you would like to add additional pips to the track without labels, you can [adjust the density](#adjusting-the-density-of-pips) of the pips as well:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->step(10)
    ->pips(PipsMode::Steps, density: 5)
```

<AutoScreenshot name="forms/fields/slider/pips-steps-density" alt="Slider with pips on steps and a custom density" version="5.x" />

### Adding pip labels to percentage positions of the track

If you would like to add pip labels to the track at specific percentage positions, you can pass a `PipsMode::Positions` object to the `pips()` method. The percentage positions need to be defined in the `pipsValues()` method in an array of numbers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips(PipsMode::Positions)
    ->pipsValues([0, 25, 50, 75, 100])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `pipsValues()` method also accepts a function to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/pips-positions" alt="Slider with pips on positions" version="5.x" />

The [density](#adjusting-the-density-of-pips) still controls the spacing of the pips without labels.

### Adding a set number of pip labels to the track

If you would like to add a set number of pip labels to the track, you can pass a `PipsMode::Count` object to the `pips()` method. The number of pips need to be defined in the `pipsValues()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips(PipsMode::Count)
    ->pipsValues(5)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `pipsValues()` method also accepts a function to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/pips-count" alt="Slider with a set number of pips" version="5.x" />

The [density](#adjusting-the-density-of-pips) still controls the spacing of the pips without labels.

### Adding pip labels to set values on the track

Instead of defining [percentage positions](#adding-pip-labels-to-percentage-positions-of-the-track) or a [set number](#adding-a-set-number-of-pip-labels-to-the-track) of pip labels, you can also define a set of values to use for the pip labels. To do this, pass a `PipsMode::Values` object to the `pips()` method. The values need to be defined in the `pipsValues()` method in an array of numbers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips(PipsMode::Values)
    ->pipsValues([5, 15, 25, 35, 45, 55, 65, 75, 85, 95])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `pipsValues()` method also accepts a function to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/slider/pips-values" alt="Slider with pips on values" version="5.x" />

The [density](#adjusting-the-density-of-pips) still controls the spacing of the pips without labels:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips(PipsMode::Values, density: 5)
    ->pipsValues([5, 15, 25, 35, 45, 55, 65, 75, 85, 95])
```

<AutoScreenshot name="forms/fields/slider/pips-values-density" alt="Slider with pips on values and a custom density" version="5.x" />

### Manually filtering pips

For even more control over how pips are displayed on a track, you can use a JavaScript expression. The JavaScript expression should return different numbers based on the pip's appearance:

* The expression should return `1` if a large pip label should be displayed.
* The expression should return `2` if a small pip label should be displayed.
* The expression should return `0` if a pip should be displayed without a label.
* The expression should return `-1` if a pip should not be displayed at all.

The [density](#adjusting-the-density-of-pips) of the pips will control which values get passed to the JavaScript expression. The expression should use the `$value` variable to access the current value of the pip. The expression should be defined in a `RawJs` object and passed to the `pipsFilter()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Support\RawJs;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->pips(density: 5)
    ->pipsFilter(RawJs::make(<<<'JS'
        ($value % 50) === 0
            ? 1
            : ($value % 10) === 0
                ? 2
                : ($value % 25) === 0
                    ? 0
                    : -1
        JS))
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `pipsFilter()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

In this example the `%` operator is used to determine the divisibility of the pip value. The expression will return `1` for every 50 units, `2` for every 10 units, `0` for every 25 units, and `-1` for all other values:

<AutoScreenshot name="forms/fields/slider/pips-filter" alt="Slider with pips filter" version="5.x" />

## Setting a minimum difference between handles

To set a minimum distance between handles, you can use the `minDifference()` method, passing a number to it. This represents the real difference between the values of both handles, not their visual distance:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->minDifference(10)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `minDifference()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Warning>
  The `minDifference()` method does not impact the validation of the slider. A skilled user could manipulate the value of the slider using JavaScript to select a value that does not align with the minimum difference. They will still be prevented from selecting a value outside the range of the slider.
</Warning>

## Setting a maximum difference between handles

To set a maximum distance between handles, you can use the `maxDifference()` method, passing a number to it. This represents the real difference between the values of both handles, not their visual distance:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->maxDifference(40)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `maxDifference()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<Warning>
  The `maxDifference()` method does not impact the validation of the slider. A skilled user could manipulate the value of the slider using JavaScript to select a value that does not align with the maximum difference. They will still be prevented from selecting a value outside the range of the slider.
</Warning>

## Controlling the general behavior of the slider

The `behavior()` method of the slider allows you to pass one or more `Behavior` objects to control the behavior of the slider. The available options are:

* `Behavior::Tap` - The slider will smoothly move to the position of the tap when the user clicks on the track. This is a default behavior, so when applying another behavior, you should also include this one in the array if you want to preserve it.
* `Behavior::Drag` - When there are two handles on the track, the user can drag the track to move both handles at the same time. The [`fillTrack([false, true, false])`](#filling-a-track-with-color) method must be used to ensure that the user has something to drag.
* `Behavior::Drag` and `Behavior::Fixed` - When there are two handles on the track, the user can drag the track to move both handles at the same time, but they cannot change the distance between them. The [`fillTrack([false, true, false])`](#filling-a-track-with-color) method must be used to ensure that the user has something to drag. Be aware that the distance between the handles is not automatically validated on the backend, so a skilled user could manipulate the value of the slider using JavaScript to select a value with a different distance. They will still be prevented from selecting a value outside the range of the slider.
* `Behavior::Unconstrained` - When there are multiple handles on the track, they can be dragged past each other. The [`minDifference()`](#setting-a-minimum-difference-between-handles) and [`maxDifference()`](#setting-a-maximum-difference-between-handles) methods will not work with this behavior.
* `Behavior::SmoothSteps` - While dragging handles, they will not snap to the [steps](#controlling-the-step-size) of the track. Once the user releases the handle, it will snap to the nearest step.

For example, to use `Behavior::Tap`, `Behavior::Drag` and `Behavior::SmoothSteps` all at once:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\Behavior;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->behavior([Behavior::Tap, Behavior::Drag, Behavior::SmoothSteps])
```

To disable all behavior, including the default `Behavior::Tap`, you can use the `behavior(null)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->behavior(null)
```

## Non-linear tracks

You can create non-linear tracks, where certain parts of the track are compressed or expanded, by defining an array of percentage points in the `nonLinearPoints()` method of the slider. Each percentage key of the array should have a corresponding real value, which will be used to calculate the position of the handle on the track. The example below features [pips](#adding-pips-to-tracks) to demonstrate the non-linear behavior of the track:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->nonLinearPoints(['20%' => 50, '50%' => 75])
    ->pips()
```

<AutoScreenshot name="forms/fields/slider/non-linear" alt="Slider with non-linear track" version="5.x" />

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `nonLinearPoints()` method also accepts a function to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

When using a non-linear track, you can also control the stepping for each section. By defining an array of two numbers for each percentage point, the first number will be used as the real value for percentage position, and the second number will be used as the step size for that section, active until the next percentage point:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 100)
    ->nonLinearPoints(['20%' => [50, 5], '50%' => [75, 1]])
    ->pips()
```

<Warning>
  When using a non-linear track, the step values of certain track sections do not affect the validation of the slider. A skilled user could manipulate the value of the slider using JavaScript to select a value that does not align with a step value in the track. They will still be prevented from selecting a value outside the range of the slider.
</Warning>

When using [pips](#adding-pips-to-tracks) with a non-linear track, you can ensure that pip labels are rounded and only displayed at selectable positions on the track. Otherwise, the stepping of a non-linear portion of the track could add labels to positions that are not selectable. To do this, use the `steppedPips()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Slider\Enums\PipsMode;

Slider::make('slider')
    ->range(minValue: 0, maxValue: 10000)
    ->nonLinearPoints(['10%' => [500, 500], '50%' => [4000, 1000]])
    ->pips(PipsMode::Positions, density: 4)
    ->pipsValues([0, 25, 50, 75, 100])
    ->steppedPips()
```

<EditOnGitHub version="5.x" path="packages/forms/docs/19-slider.md" />

<Footer />
