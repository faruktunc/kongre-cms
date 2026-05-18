> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Repeater

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

The repeater component allows you to output a JSON array of repeated form components.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

Repeater::make('members')
    ->schema([
        TextInput::make('name')->required(),
        Select::make('role')
            ->options([
                'member' => 'Member',
                'administrator' => 'Administrator',
                'owner' => 'Owner',
            ])
            ->required(),
    ])
    ->columns(2)
```

<AutoScreenshot name="forms/fields/repeater/simple" alt="Repeater" version="5.x" />

We recommend that you store repeater data with a `JSON` column in your database. Additionally, if you're using Eloquent, make sure that column has an `array` cast.

As evident in the above example, the component schema can be defined within the `schema()` method of the component:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

Repeater::make('members')
    ->schema([
        TextInput::make('name')->required(),
        // ...
    ])
```

If you wish to define a repeater with multiple schema blocks that can be repeated in any order, please use the [builder](./builder).

## Setting empty default items

Repeaters may have a certain number of empty items created by default. The default is only used when a schema is loaded with no data. In a standard [panel resource](../resources), defaults are used on the Create page, not the Edit page. To use default items, pass the number of items to the `defaultItems()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->defaultItems(3)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `defaultItems()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Adding items

An action button is displayed below the repeater to allow the user to add a new item.

## Setting the add action button's label

You may set a label to customize the text that should be displayed in the button for adding a repeater item, using the `addActionLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->addActionLabel('Add member')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `addActionLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Aligning the add action button

By default, the add action is aligned in the center. You may adjust this using the `addActionAlignment()` method, passing an `Alignment` option of `Alignment::Start` or `Alignment::End`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Support\Enums\Alignment;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->addActionAlignment(Alignment::Start)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `addActionAlignment()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/repeater/add-action-alignment" alt="Repeater with add action aligned to the start" version="5.x" />

### Preventing the user from adding items

You may prevent the user from adding items to the repeater using the `addable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->addable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `addable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Deleting items

An action button is displayed on each item to allow the user to delete it.

### Preventing the user from deleting items

You may prevent the user from deleting items from the repeater using the `deletable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->deletable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `deletable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Reordering items

A button is displayed on each item to allow the user to drag and drop to reorder it in the list.

### Preventing the user from reordering items

You may prevent the user from reordering items from the repeater using the `reorderable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->reorderable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Reordering items with buttons

You may use the `reorderableWithButtons()` method to enable reordering items with buttons to move the item up and down:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->reorderableWithButtons()
```

<AutoScreenshot name="forms/fields/repeater/reorderable-with-buttons" alt="Repeater that is reorderable with buttons" version="5.x" />

Optionally, you may pass a boolean value to control if the repeater should be ordered with buttons or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->reorderableWithButtons(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderableWithButtons()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Preventing reordering with drag and drop

You may use the `reorderableWithDragAndDrop(false)` method to prevent items from being ordered with drag and drop:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->reorderableWithDragAndDrop(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderableWithDragAndDrop()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Collapsing items

The repeater may be `collapsible()` to optionally hide content in long forms:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->schema([
        // ...
    ])
    ->collapsible()
```

<AutoScreenshot name="forms/fields/repeater/collapsible" alt="Collapsible repeater" version="5.x" />

You may also collapse all items by default:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->schema([
        // ...
    ])
    ->collapsed()
```

<AutoScreenshot name="forms/fields/repeater/collapsed" alt="Collapsed repeater" version="5.x" />

Optionally, the `collapsible()` and `collapsed()` methods accept a boolean value to control if the repeater should be collapsible and collapsed or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->schema([
        // ...
    ])
    ->collapsible(FeatureFlag::active())
    ->collapsed(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `collapsible()` and `collapsed()` methods also accept functions to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Cloning items

You may allow repeater items to be duplicated using the `cloneable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->schema([
        // ...
    ])
    ->cloneable()
```

<AutoScreenshot name="forms/fields/repeater/cloneable" alt="Cloneable repeater" version="5.x" />

Optionally, the `cloneable()` method accepts a boolean value to control if the repeater should be cloneable or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->schema([
        // ...
    ])
    ->cloneable(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `cloneable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Integrating with an Eloquent relationship

You may employ the `relationship()` method of the `Repeater` to configure a `HasMany` relationship. Filament will load the item data from the relationship, and save it back to the relationship when the form is submitted. If a custom relationship name is not passed to `relationship()`, Filament will use the field name as the relationship name:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->relationship()
    ->schema([
        // ...
    ])
```

### Reordering items in a relationship

By default, [reordering](#reordering-items) relationship repeater items is disabled. This is because your related model needs a `sort` column to store the order of related records. To enable reordering, you may use the `orderColumn()` method, passing in a name of the column on your related model to store the order in:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->relationship()
    ->schema([
        // ...
    ])
    ->orderColumn('sort')
```

If you use something like [`spatie/eloquent-sortable`](https://github.com/spatie/eloquent-sortable) with an order column such as `order_column`, you may pass this in to `orderColumn()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->relationship()
    ->schema([
        // ...
    ])
    ->orderColumn('order_column')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `orderColumn()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Integrating with a `BelongsToMany` Eloquent relationship

There is a common misconception that using a `BelongsToMany` relationship with a repeater is as simple as using a `HasMany` relationship. This is not the case, as a `BelongsToMany` relationship requires a pivot table to store the relationship data. The repeater saves its data to the related model, not the pivot table. Therefore, if you want to map each repeater item to a row in the pivot table, you must use a `HasMany` relationship with a pivot model to use a repeater with a `BelongsToMany` relationship.

Imagine you have a form to create a new `Order` model. Each order belongs to many `Product` models, and each product belongs to many orders. You have a `order_product` pivot table to store the relationship data. Instead of using the `products` relationship with the repeater, you should create a new relationship called `orderProducts` on the `Order` model, and use that with the repeater:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Relations\HasMany;

public function orderProducts(): HasMany
{
    return $this->hasMany(OrderProduct::class);
}
```

If you don't already have an `OrderProduct` pivot model, you should create that, with inverse relationships to `Order` and `Product`:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public $incrementing = true;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
```

<Info>
  Please ensure that your pivot model has a primary key column, like `id`, to allow Filament to keep track of which repeater items have been created, updated and deleted. To make sure that Filament keeps track of the primary key, the pivot model needs to have the `$incrementing` property set to `true`.
</Info>

Now you can use the `orderProducts` relationship with the repeater, and it will save the data to the `order_product` pivot table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

Repeater::make('orderProducts')
    ->relationship()
    ->schema([
        Select::make('product_id')
            ->relationship('product', 'name')
            ->required(),
        // ...
    ])
```

### Mutating related item data before filling the field

You may mutate the data for a related item before it is filled into the field using the `mutateRelationshipDataBeforeFillUsing()` method. This method accepts a closure that receives the current item's data in a `$data` variable. You must return the modified array of data:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->relationship()
    ->schema([
        // ...
    ])
    ->mutateRelationshipDataBeforeFillUsing(function (array $data): array {
        $data['user_id'] = auth()->id();

        return $data;
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Data;;array<array<string, mixed>>;;$data;;The data that is being filled into the repeater.">You can inject various utilities into the function passed to `mutateRelationshipDataBeforeFillUsing()` as parameters.</UtilityInjection>

### Mutating related item data before creating

You may mutate the data for a new related item before it is created in the database using the `mutateRelationshipDataBeforeCreateUsing()` method. This method accepts a closure that receives the current item's data in a `$data` variable. You can choose to return either the modified array of data, or `null` to prevent the item from being created:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->relationship()
    ->schema([
        // ...
    ])
    ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
        $data['user_id'] = auth()->id();

        return $data;
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Data;;array<string, mixed>;;$data;;The data that is being saved by the repeater.">You can inject various utilities into the function passed to `mutateRelationshipDataBeforeCreateUsing()` as parameters.</UtilityInjection>

### Mutating related item data before saving

You may mutate the data for an existing related item before it is saved in the database using the `mutateRelationshipDataBeforeSaveUsing()` method. This method accepts a closure that receives the current item's data in a `$data` variable. You can choose to return either the modified array of data, or `null` to prevent the item from being saved:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->relationship()
    ->schema([
        // ...
    ])
    ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
        $data['user_id'] = auth()->id();

        return $data;
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Data;;array<string, mixed>;;$data;;The data that is being saved by the repeater.">You can inject various utilities into the function passed to `mutateRelationshipDataBeforeSaveUsing()` as parameters.</UtilityInjection>

### Running code after creating a related item

You may run code after a new related item is created in the database using the `afterCreate()` method. This method accepts a closure that receives the current item's data in a `$data` variable and the newly created record in a `$record` variable. This is useful when you need the record's ID to perform additional operations, such as attaching pivot data:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;

Repeater::make('variants')
    ->relationship()
    ->schema([
        // ...
    ])
    ->afterCreate(function (array $data, Model $record): void {
        if (isset($data['attributes'])) {
            $record->attributes()->attach($data['attributes']);
        }
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Data;;array<string, mixed>;;$data;;The data that was used to create the record.||Record;;Illuminate\Database\Eloquent\Model;;$record;;The newly created record.">You can inject various utilities into the function passed to `afterCreate()` as parameters.</UtilityInjection>

### Running code after updating a related item

You may run code after an existing related item is updated in the database using the `afterUpdate()` method. This method accepts a closure that receives the current item's data in a `$data` variable and the updated record in a `$record` variable:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;

Repeater::make('variants')
    ->relationship()
    ->schema([
        // ...
    ])
    ->afterUpdate(function (array $data, Model $record): void {
        if (isset($data['attributes'])) {
            $record->attributes()->sync($data['attributes']);
        }
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Data;;array<string, mixed>;;$data;;The data that was used to update the record.||Record;;Illuminate\Database\Eloquent\Model;;$record;;The updated record.">You can inject various utilities into the function passed to `afterUpdate()` as parameters.</UtilityInjection>

### Running code after deleting a related item

You may run code after a related item is deleted from the database using the `afterDelete()` method. This method accepts a closure that receives the record that was just deleted in a `$record` variable. The record will no longer exist in the database at this point, but you can still access its attributes, such as its ID:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

Repeater::make('attachments')
    ->relationship()
    ->schema([
        // ...
    ])
    ->afterDelete(function (Model $record): void {
        Storage::delete($record->file_path);
    })
```

<UtilityInjection set="formFields" version="5.x" extras="Record;;Illuminate\Database\Eloquent\Model;;$record;;The record that was just deleted.">You can inject various utilities into the function passed to `afterDelete()` as parameters.</UtilityInjection>

### Modifying related records after retrieval

You may filter or modify the related records of a repeater after they are retrieved from the database using the `modifyRecordsUsing` argument. This method accepts a function that receives a `Collection` of related records. You should return the modified collection.

This can be particularly useful to restrict records to a specific group or category without doing this in the database query itself, which would trigger an extra query if the records are already eager loaded:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Collection;

Repeater::make('startItems')
    ->relationship(name: 'items', modifyRecordsUsing: fn (Collection $records): Collection => $records->where('group', 'start')),
Repeater::make('endItems')
    ->relationship(name: 'items', modifyRecordsUsing: fn (Collection $records): Collection => $records->where('group', 'end')),
```

<UtilityInjection set="formFields" version="5.x" extras="Records;;Illuminate\Database\Eloquent\Collection;;$records;;The collection of related records.">You can inject various utilities into the function passed to `modifyRecordsUsing` as parameters.</UtilityInjection>

## Grid layout

You may organize repeater items into columns by using the `grid()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('qualifications')
    ->schema([
        // ...
    ])
    ->grid(2)
```

<AutoScreenshot name="forms/fields/repeater/grid" alt="Repeater with a 2 column grid of items" version="5.x" />

This method accepts the same options as the `columns()` method of the [grid](../schemas/layouts#grid-system). This allows you to responsively customize the number of grid columns at various breakpoints.

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `grid()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Adding a label to repeater items based on their content

You may add a label for repeater items using the `itemLabel()` method. This method accepts a closure that receives the current item's data in a `$state` variable. You must return a string to be used as the item label:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

Repeater::make('members')
    ->schema([
        TextInput::make('name')
            ->required()
            ->live(onBlur: true),
        Select::make('role')
            ->options([
                'member' => 'Member',
                'administrator' => 'Administrator',
                'owner' => 'Owner',
            ])
            ->required(),
    ])
    ->columns(2)
    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
```

<Tip>
  Any fields that you use from `$state` should be `live()` if you wish to see the item label update live as you use the form.
</Tip>

<UtilityInjection set="formFields" version="5.x" extras="Item;;Filament\Schemas\Schema;;$item;;The schema object for the current repeater item.||Key;;string;;$key;;The key for the current repeater item.||Index;;int;;$index;;The zero-based index of the current repeater item.||State;;array<string, mixed>;;$state;;The raw unvalidated data for the current repeater item.">You can inject various utilities into the function passed to `itemLabel()` as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/repeater/labelled" alt="Repeater with item labels" version="5.x" />

## Numbering repeater items

You can add the repeater item's number next to its label using the `itemNumbers()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->itemNumbers()
```

<AutoScreenshot name="forms/fields/repeater/numbered" alt="Repeater with numbered items" version="5.x" />

## Simple repeaters with one field

You can use the `simple()` method to create a repeater with a single field, using a minimal design

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

Repeater::make('invitations')
    ->simple(
        TextInput::make('email')
            ->email()
            ->required(),
    )
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `simple()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/repeater/simple-one-field" alt="Simple repeater design with only one field" version="5.x" />

Instead of using a nested array to store data, simple repeaters use a flat array of values. This means that the data structure for the above example could look like this:

```php theme={"theme":"gruvbox-dark-hard"}
[
    'invitations' => [
        'dan@filamentphp.com',
        'ryan@filamentphp.com',
    ],
],
```

## Using `$get()` to access parent field values

All form components are able to [use `$get()` and `$set()`](./overview#injecting-the-state-of-another-field) to access another field's value. However, you might experience unexpected behavior when using this inside the repeater's schema.

This is because `$get()` and `$set()`, by default, are scoped to the current repeater item. This means that you are able to interact with another field inside that repeater item easily without knowing which repeater item the current form component belongs to.

The consequence of this is that you may be confused when you are unable to interact with a field outside the repeater. We use `../` syntax to solve this problem - `$get('../parent_field_name')`.

Consider your form has this data structure:

```php theme={"theme":"gruvbox-dark-hard"}
[
    'client_id' => 1,

    'repeater' => [
        'item1' => [
            'service_id' => 2,
        ],
    ],
]
```

You are trying to retrieve the value of `client_id` from inside the repeater item.

`$get()` is relative to the current repeater item, so `$get('client_id')` is looking for `$get('repeater.item1.client_id')`.

You can use `../` to go up a level in the data structure, so `$get('../client_id')` is `$get('repeater.client_id')` and `$get('../../client_id')` is `$get('client_id')`.

The special case of `$get()` with no arguments, or `$get('')` or `$get('./')`, will always return the full data array for the current repeater item.

## Table repeaters

You can present repeater items in a table format using the `table()` method, which accepts an array of `TableColumn` objects. These objects represent the columns of the table, which correspond to any components in the schema of the repeater:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

Repeater::make('members')
    ->table([
        TableColumn::make('Name'),
        TableColumn::make('Role'),
    ])
    ->schema([
        TextInput::make('name')
            ->required(),
        Select::make('role')
            ->options([
                'member' => 'Member',
                'administrator' => 'Administrator',
                'owner' => 'Owner',
            ])
            ->required(),
    ])
```

<AutoScreenshot name="forms/fields/repeater/table" alt="Repeater with a table layout" version="5.x" />

The labels displayed in the header of the table are passed to the `TableColumn::make()` method. If you want to provide an accessible label for a column but do not wish to display it, you can use the `hiddenHeaderLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater\TableColumn;

TableColumn::make('Name')
    ->hiddenHeaderLabel()
```

If you would like to mark a column as "required" with a red asterisk, you can use the `markAsRequired()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater\TableColumn;

TableColumn::make('Name')
    ->markAsRequired()
```

You can enable wrapping of the column header using the `wrapHeader()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater\TableColumn;

TableColumn::make('Name')
    ->wrapHeader()
```

You can also adjust the alignment of the column header using the `alignment()` method, passing an `Alignment` option of `Alignment::Start`, `Alignment::Center`, or `Alignment::End`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Support\Enums\Alignment;

TableColumn::make('Name')
    ->alignment(Alignment::Start)
```

You can set a fixed column width using the `width()` method, passing a string value that represents the width of the column. This value is passed directly to the `style` attribute of the column header:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater\TableColumn;

TableColumn::make('Name')
    ->width('200px')
```

### Compact table repeaters

You can make table repeaters more compact by using the `compact()` method, to fit more data in a smaller space:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->table([
        // ...
    ])
    ->compact()
    ->schema([
        // ...
    ])
```

Optionally, you may pass a boolean value to control if the table repeater should be compact or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->table([
        // ...
    ])
    ->compact(FeatureFlag::active())
    ->schema([
        // ...
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `compact()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/repeater/table-compact" alt="Repeater with a compact table layout" version="5.x" />

## Repeater validation

As well as all rules listed on the [validation](./validation) page, there are additional rules that are specific to repeaters.

### Number of items validation

You can validate the minimum and maximum number of items that you can have in a repeater by setting the `minItems()` and `maxItems()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->minItems(2)
    ->maxItems(5)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `minItems()` and `maxItems()` methods also accept a function to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

### Distinct state validation

In many cases, you will want to ensure some sort of uniqueness between repeater items. A couple of common examples could be:

* Ensuring that only one [checkbox](./checkbox) or [toggle](./toggle) is activated at once across items in the repeater.
* Ensuring that an option may only be selected once across [select](./select), [radio](./radio), [checkbox list](./checkbox-list), or [toggle buttons](./toggle-buttons) fields in a repeater.

You can use the `distinct()` method to validate that the state of a field is unique across all items in the repeater:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;

Repeater::make('answers')
    ->schema([
        // ...
        Checkbox::make('is_correct')
            ->distinct(),
    ])
```

The behavior of the `distinct()` validation depends on the data type that the field handles

* If the field returns a boolean, like a [checkbox](./checkbox) or [toggle](./toggle), the validation will ensure that only one item has a value of `true`. There may be many fields in the repeater that have a value of `false`.
* Otherwise, for fields like a [select](./select), [radio](./radio), [checkbox list](./checkbox-list), or [toggle buttons](./toggle-buttons), the validation will ensure that each option may only be selected once across all items in the repeater.

Optionally, you may pass a boolean value to the `distinct()` method to control if the field should be distinct or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;

Checkbox::make('is_correct')
    ->distinct(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `distinct()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Automatically fixing indistinct state

If you'd like to automatically fix indistinct state, you can use the `fixIndistinctState()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;

Repeater::make('answers')
    ->schema([
        // ...
        Checkbox::make('is_correct')
            ->fixIndistinctState(),
    ])
```

This method will automatically enable the `distinct()` and `live()` methods on the field.

Depending on the data type that the field handles, the behavior of the `fixIndistinctState()` adapts:

* If the field returns a boolean, like a [checkbox](./checkbox) or [toggle](./toggle), and one of the fields is enabled, Filament will automatically disable all other enabled fields on behalf of the user.
* Otherwise, for fields like a [select](./select), [radio](./radio), [checkbox list](./checkbox-list), or [toggle buttons](./toggle-buttons), when a user selects an option, Filament will automatically deselect all other usages of that option on behalf of the user.

Optionally, you may pass a boolean value to the `fixIndistinctState()` method to control if the field should fix indistinct state or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Checkbox;

Checkbox::make('is_correct')
    ->fixIndistinctState(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `fixIndistinctState()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

#### Disabling options when they are already selected in another item

If you'd like to disable options in a [select](./select), [radio](./radio), [checkbox list](./checkbox-list), or [toggle buttons](./toggle-buttons) when they are already selected in another item, you can use the `disableOptionsWhenSelectedInSiblingRepeaterItems()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

Repeater::make('members')
    ->schema([
        Select::make('role')
            ->options([
                // ...
            ])
            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
    ])
```

This method will automatically enable the `distinct()` and `live()` methods on the field.

<Warning>
  In case you want to add another condition to [disable options](./select#disabling-specific-options) with, you can chain `disableOptionWhen()` with the `merge: true` argument:

  ```php theme={"theme":"gruvbox-dark-hard"}
  use Filament\Forms\Components\Repeater;
  use Filament\Forms\Components\Select;

  Repeater::make('members')
      ->schema([
          Select::make('role')
              ->options([
                  // ...
              ])
              ->disableOptionsWhenSelectedInSiblingRepeaterItems()
              ->disableOptionWhen(fn (string $value): bool => $value === 'super_admin', merge: true),
      ])
  ```
</Warning>

## Customizing the repeater item actions

This field uses action objects for easy customization of buttons within it. You can customize these buttons by passing a function to an action registration method. The function has access to the `$action` object, which you can use to [customize it](../actions/overview). The following methods are available to customize the actions:

* `addAction()`
* `cloneAction()`
* `collapseAction()`
* `collapseAllAction()`
* `deleteAction()`
* `expandAction()`
* `expandAllAction()`
* `moveDownAction()`
* `moveUpAction()`
* `reorderAction()`

Here is an example of how you might customize an action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->collapseAllAction(
        fn (Action $action) => $action->label('Collapse all members'),
    )
```

<UtilityInjection set="formFields" version="5.x" extras="Action;;Filament\Actions\Action;;$action;;The action object to customize.">The action registration methods can inject various utilities into the function as parameters.</UtilityInjection>

### Confirming repeater actions with a modal

You can confirm actions with a modal by using the `requiresConfirmation()` method on the action object. You may use any [modal customization method](../actions/modals) to change its content and behavior:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;

Repeater::make('members')
    ->schema([
        // ...
    ])
    ->deleteAction(
        fn (Action $action) => $action->requiresConfirmation(),
    )
```

<Info>
  The `collapseAction()`, `collapseAllAction()`, `expandAction()`, `expandAllAction()` and `reorderAction()` methods do not support confirmation modals, as clicking their buttons does not make the network request that is required to show the modal.
</Info>

### Adding extra item actions to a repeater

You may add new [action buttons](../actions) to the header of each repeater item by passing `Action` objects into `extraItemActions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Mail;

Repeater::make('members')
    ->schema([
        TextInput::make('email')
            ->label('Email address')
            ->email(),
        // ...
    ])
    ->extraItemActions([
        Action::make('sendEmail')
            ->icon(Heroicon::Envelope)
            ->action(function (array $arguments, Repeater $component): void {
                $itemData = $component->getItemState($arguments['item']);

                Mail::to($itemData['email'])
                    ->send(
                        // ...
                    );
            }),
    ])
```

In this example, `$arguments['item']` gives you the ID of the current repeater item. You can validate the data in that repeater item using the `getItemState()` method on the repeater component. This method returns the validated data for the item. If the item is not valid, it will cancel the action and show an error message for that item in the form.

If you want to get the raw data from the current item without validating it, you can use `$component->getRawItemState($arguments['item'])` instead.

If you want to manipulate the raw data for the entire repeater, for example, to add, remove or modify items, you can use `$component->getState()` to get the data, and `$component->state($state)` to set it again:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Support\Str;

// Get the raw data for the entire repeater
$state = $component->getState();

// Add an item, with a random UUID as the key
$state[Str::uuid()] = [
    'email' => auth()->user()->email,
];

// Set the new data for the repeater
$component->state($state);
```

<EditOnGitHub version="5.x" path="packages/forms/docs/12-repeater.md" />

<Footer />
